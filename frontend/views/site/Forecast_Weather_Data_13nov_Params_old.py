#!/usr/bin/env python
# coding: utf-8

#Version for params: Station , column, #ofDays, startDate, endDate
# In[1]:

import sys
import pandas as pd
data=pd.read_excel("data_station__santiago.xlsx") #change the location as per your data location here.
data=data.loc[data['station_id']==int(sys.argv[1])]

# In[2]:


#print("Top 10 rows of the data: ")
#print(data.head(10))


# In[3]:


pd.set_option('display.max_columns', 200)
pd.set_option('display.max_rows', 100)
#print("The list of columns: ")
#for i in data.columns:
##    print(i)


# In[4]:


#print("Null values found in columns: ")
print(data.isnull().sum())


# In[5]:


#you can put other variables here, but I preferred not to as too much missing data there.
df1 = data[['station_id','date','temp_out','temp_in','hum_out','hum_in','et','uv']]
#df1 = data[['station_id','date','temp_out','temp_in','rain_month_mm','et']]


# In[6]:


df1.isnull().sum()


# In[7]:


df1.dtypes


# In[8]:


df1=df1.dropna()
df1.isnull().sum()


# In[9]:


len(df1)


# In[10]:

if len(sys.argv)==6:
    station_id=int(sys.argv[1])
    variable=sys.argv[2]
else:
    station_id=int(input('Enter Station ID: '))
    variable=input('Enter Variable to predict(temp_out/temp_in/hum_out/hum_in/et/uv): ')

# In[11]:


df_final=df1.loc[(df1['station_id']==station_id)]
predict=df_final[['date',variable]]


# In[12]:


#pip install fbprophet


# In[13]:


from fbprophet import Prophet


# In[14]:


#importing prophet model
#Defining the Function
def function_FBProphet_Forecast(column_name, no_of_days, start_date, end_date):
    df=predict
    df['y']=df[column_name]
    df['ds']=df.date
    df=df.dropna()

    #creating and fitting prophet model on data
    model = Prophet(interval_width=0.95,yearly_seasonality=True)
    model.fit(df)

    no_of_days=int(no_of_days)
    #create future dates
    future_dates = model.make_future_dataframe(periods=no_of_days*24,freq = 'H',include_history=False) #hourly frequency like our data, And future 720 hours(30 days) to be predicted.
    #future_dates.tail() #last 5 values of future data


    #forecasting for future dates
    forecast = model.predict(future_dates)
    #filter future dates
    print('Forecasted Results for '+""+start_date+" to "+end_date)
    forecast_filtered=forecast.loc[(forecast['ds']>=start_date) & (forecast['ds']<=end_date)]
    forecast_filtered.to_csv('Forecast_Data_Next_10_days.csv')
    if forecast_filtered.empty==False:
        print('Forecast For '+""+column_name)
        print(forecast_filtered[['ds', 'yhat']])
        print()
        #Daily Mean
        print('The Daily Mean of the Filtered Forecast Dates:')
        forecast_filtered['ds']= pd.to_datetime(forecast_filtered['ds'])
        forecast_filtered['ds'] = forecast_filtered['ds'].dt.date
        #print()
        print('Mean Daily Results for Column: '+""+column_name)
        print(forecast_filtered.groupby('ds')['yhat'].mean())
        print('**progdata**')
        #print(forecast_filtered.groupby('ds')['yhat'].mean())
        print(forecast_filtered.groupby('ds')['yhat'].mean().to_json())
        print('**progdata**')
    #exception
    else:
        print('Enter a range within the forecasted dates and try again!')

    return forecast_filtered.groupby('ds')['yhat'].mean()


# In[ ]:





# In[15]:


indata_start=predict.date.iloc[0]
indata_end=predict.date.iloc[-1]
#print("Starting day of data found: ")
#print(indata_start)
#print("Ending day of data found: ")
#print(indata_end)


# In[16]:

from datetime import datetime, timedelta

if len(sys.argv)==6:
    no_of_days=sys.argv[3]

    start_date=sys.argv[4]#datetime.today()#.strftime('%Y-%m-%d')#input('Enter Start Date of Forecast View(Ex:2020-05-17): '+" "+'Date must be after'+" "+str(indata_end)+" :") 
    #td = timedelta(days=10)
    end_date = sys.argv[5]#start_date + td #input('Enter End Date of Forecast View(Ex:2020-08-18): ')
    #start_date=str(start_date)
    #end_date=str(end_date)
else:
    no_of_days=input('No of Future Days you want to predict: ')
    start_date=datetime.today()#.strftime('%Y-%m-%d')#input('Enter Start Date of Forecast View(Ex:2020-05-17): '+" "+'Date must be after'+" "+str(indata_end)+" :") 
    td = timedelta(days=10)
    end_date = start_date + td #input('Enter End Date of Forecast View(Ex:2020-08-18): ')
    start_date=str(start_date)
    end_date=str(end_date)
    
print('Today Date')
print(start_date)
print('10 days after today:')
print(end_date)


# In[17]:


#Calling function to view outputs
import warnings
warnings.filterwarnings("ignore")
forecasted_results=function_FBProphet_Forecast(variable, no_of_days, start_date, end_date)


# # Newly Added Part

# In[18]:


start_week = pd.to_datetime(start_date,errors='coerce').week
start_week


# In[19]:


end_week = pd.to_datetime(end_date,errors='coerce').week
end_week


# In[20]:


df_final_temp=df_final
df_final_temp['week'] = pd.DatetimeIndex(df_final_temp['date']).week


# In[21]:


df_final_temp.head()


# In[22]:


df_final_temp_=df_final_temp.loc[(df_final_temp['week']>=start_week) & (df_final_temp['week']<=end_week)]


# In[23]:


df_final_temp_


# In[24]:


previous_mean=df_final_temp_.groupby('week')[variable].mean()
print('Mean of previous years data in forecasted range: ')
print(previous_mean.mean())


# In[25]:


print('Mean of forecasted days: ')
print(forecasted_results.mean())


# In[26]:


#difference of forecasts with previous
print("The percentage of absoulte difference of forecasted mean and previous year's mean: ")
print(abs((forecasted_results.mean()-previous_mean.mean())*100)/previous_mean.mean())


# In[ ]:


#END

