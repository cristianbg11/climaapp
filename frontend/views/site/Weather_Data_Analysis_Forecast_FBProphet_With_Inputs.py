#!/usr/bin/env python
# coding: utf-8

# # Prototype with variables inputs (FBProphet Model)

# In[1]:


#Defining the Function
def function_FBProphet_Forecast(column_name, no_of_days, start_date, end_date):
    import warnings
    warnings.filterwarnings('ignore')
    import pandas as pd
    pd.set_option('display.max_rows', 500)
    
    data = pd.read_csv('ISA_Processed.txt', delimiter = "\t", header=[0,1])
    #formatting column names
    data.columns = data.columns.map('_'.join)
    #print(data)
    #removing unnecessary parts from the column names and rename it
    data=data.rename(columns={'Unnamed: 0_level_0_Date':'Date','Unnamed: 1_level_0_        Time':'Time','Unnamed: 17_level_0_Rain':'Rain',
                         'Unnamed: 16_level_0_Bar  ':'Bar','Unnamed: 33_level_0_ET ':'ET','        Temp_Out':'Temp_Out'})
    
    #dropping some columns temporarily for type fixing of the other columns
    data1=data.drop(['Date','Time','Wind_Dir','Hi_Dir'],axis=1)
    #Replacing '---' with a small value
    data1=data1.replace('---', 0.0001)
    #casting the data to float
    data1=data1.astype(float)

    #formatting time column in original df
    data1['Time'] = data['Time'].str.replace('a|p', '')
    data1['Date']=data['Date']

    data1['DateTime']=data1['Date']+" "+data1['Time']
    data1=data1.set_index('DateTime')
    #data1


    #importing prophet model
    from prophet import Prophet
    import datetime

    
    #Extracting two columns needed for prophet model: 'Date' and target column 'ET'
    data1.index = pd.to_datetime(data1.index, errors='coerce')
    data1.index = data1.index.strftime('%Y/%m/%d %H:%M')
    df=data1
    df['y']=data1[column_name]
    df['ds']=data1.index
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
    print('Filtered Forecasted Results for '+""+start_date+" to "+end_date)
    forecast_filtered=forecast.loc[(forecast['ds']>=start_date) & (forecast['ds']<=end_date)]
    if forecast_filtered.empty==False:
        print('Forecast For '+""+column_name)
        print(forecast_filtered[['ds', 'yhat']])
        print()
        #Daily Mean
        print('The Daily Mean of the Filtered Forecast Dates:')
        forecast_filtered['ds']= pd.to_datetime(forecast_filtered['ds'])
        forecast_filtered['ds'] = forecast_filtered['ds'].dt.date
        print()
        print('Mean Daily Results for Column: '+""+column_name)
        print(forecast_filtered.groupby('ds')['yhat'].mean())
    #exception
    else:
        print('Enter a range within the forecasted dates and try again!')  


# In[2]:


#inputs
column_name=input("Enter a Column Name to Predict(Temp_out/Out_Hum/Wind_Speed/Solar_Rad/ET/ETP:")
no_of_days=input('No of Future Days you want to predict: ')
start_date=input('Enter Start Date of Forecast View(Ex:2020-05-17): ') 
end_date=input('Enter End Date of Forecast View(Ex:2020-08-18): ')


# In[3]:


#Calling function to view outputs
function_FBProphet_Forecast(column_name, no_of_days, start_date, end_date)


# In[ ]:


#End

