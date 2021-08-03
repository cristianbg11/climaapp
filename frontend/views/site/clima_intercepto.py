#!/usr/bin/env python
# coding: utf-8

# # Read data

# In[1]:


import warnings
warnings.filterwarnings('ignore')
import pandas as pd
df = pd.read_csv('ISA.txt', delimiter = "\t", header=[0,1])


# In[2]:


#view raw data
#print(df)


# # Preprocessing Dataset

# In[3]:


#formatting column names
df.columns = df.columns.map('_'.join)
#print(df)


# In[4]:


#checking column names
#print(df.columns)


# In[5]:


#removing unnecessary parts from the column names and rename it
df=df.rename(columns={'Unnamed: 0_level_0_Date':'Date','Unnamed: 1_level_0_        Time':'Time','Unnamed: 17_level_0_Rain':'Rain',
                     'Unnamed: 16_level_0_Bar  ':'Bar','Unnamed: 33_level_0_ET ':'ET','        Temp_Out':'Temp_Out'})


# In[6]:


#view column names
#print(df.columns)


# In[7]:


#dropping some columns temporarily for type fixing of the other columns
df1=df.drop(['Date','Time','Wind_Dir','Hi_Dir'],axis=1)


# In[8]:


#Replacing '---' with a small value
df1=df1.replace('---', 0.0001)
#casting the data to float
df1=df1.astype(float)


# In[9]:


df1


# In[10]:


df1['Leaf _Temp 1'].std()


# In[11]:


#Replacing the small value .001 with the mean value of that column
import numpy as np
for i in df1.columns:
    df1[i]=df1[i].replace(0.0001, df1[i].mean())
    #print()


# In[12]:


#viewing unique values to see column's impact
import numpy as np
#for i in df1.columns:
   #print(i)
    #print(df1[i].unique())
    #print()


# i) Leaf_Wet 2,
# ii) Wind_Tx,
# iii) Arc._Int-->
# These three columns has too much repetitive values. So, we have to drop them to avoid overfitting.
# 

# In[13]:


#getting back the dropped columns
#categorizing the category columns 
df1['Wind_Dir']=df['Wind_Dir'].astype('category')
df1['Hi_Dir']=df['Hi_Dir'].astype('category')


# In[14]:


#encoding the categorized columns
df1['Wind_Dir']=df1['Wind_Dir'].cat.codes
df1['Hi_Dir']=df1['Hi_Dir'].cat.codes


# In[15]:


df1


# In[16]:


#dropping unnecessary columns
df2=df1.drop(['Leaf_Wet 2','Wind_Tx ','Arc._Int.'],axis=1)


# In[17]:


#formatting time column in original df
df['Time'] = df['Time'].str.replace('a|p', '')


# In[18]:


df


# In[19]:


#getting back the time and date column to processed dataframe (df2) from original dataframe(df)
df2['DateTime']=df['Date']+" "+df['Time']


# In[20]:


#set Date as index
df2=df2.set_index('DateTime')


# In[21]:


df2


# In[22]:


#dropping Hi_Temp,Low_Temp while predicting Temp_Out
Regression_Data=df2.drop(['Hi_Temp','Low_Temp'],axis=1)


# # Predicting Temp_Out

# In[23]:


#print(Regression_Data)


# In[24]:


#input features except Temp_out
X=Regression_Data.drop(['Temp_Out'],axis=1)
#target column "Temp_Out"
y=Regression_Data['ET']


# In[25]:


#train test split
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.33, shuffle=False)


# In[26]:


#model fitting
from sklearn.linear_model import LinearRegression
reg = LinearRegression()
reg.fit(X_train, y_train)


# In[27]:


#training performance
#print('Training performance for Temperature:')
reg.score(X_train, y_train)


# In[28]:


#prediction using test data
prediction_temp=reg.predict(X_test)
print('\n', reg.intercept_)
#print('Coefficiente: \n', reg.coef_)
"""
# In[29]:


#Prediction Performance using R-squared
from sklearn.metrics import r2_score
print("R2 score for Temperature Prediction is:")
print(r2_score(y_test, prediction_temp))


# In[30]:


# actual vs prediction graph 
import matplotlib.pyplot as plt
fig, ax = plt.subplots()
ax.scatter(y_test, prediction_temp)
ax.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'k--')
ax.set_xlabel('Measured Temperature')
ax.set_ylabel('Predicted Temperature')
plt.show()


# # ETP Prediction

# In[31]:


X=Regression_Data[['Temp_Out', 'Out_Hum', 'Wind_Speed', 'Solar_Rad.']]
X['ETP']=(0.385*X['Solar_Rad.'])*(X['Temp_Out'])*(X['Out_Hum'])*(X['Wind_Speed']*183)
X1=X[['Temp_Out', 'Out_Hum', 'Wind_Speed', 'Solar_Rad.']]
#target column "Rain"
y=X['ETP']


# In[32]:


#train test split
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X1, y, test_size=0.20,shuffle=False)


# In[33]:


#model fitting
from sklearn.linear_model import LinearRegression
reg2 = LinearRegression()
reg2.fit(X_train, y_train)


# In[ ]:


#training performance
print('Training performance for ETP:')
print(reg2.score(X_train, y_train))


# In[ ]:


#prediction using test data
prediction_ETP=reg2.predict(X_test)


# In[ ]:


#Prediction Performance using R-squared
from sklearn.metrics import r2_score
print("R2 score for ETP Prediction is:")
print(r2_score(y_test, prediction_ETP))


# In[ ]:


# actual vs prediction graph 
import matplotlib.pyplot as plt
fig, ax = plt.subplots()
ax.scatter(y_test, prediction_ETP)
ax.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'k--')
ax.set_xlabel('Measured ETP for Linear Regression')
ax.set_ylabel('Predicted ETP Linear Regression')
plt.show()


# # Logistic regression

# In[ ]:


y_train.unique()


# In[ ]:


#logistic regression can not be used as we can see our target variable "y_train" that is ETP is containing continuous values
#to fit a logistic regression, we must use a target column/dependent variable which has binary/categorical values.


# # K-Nearest Neighbor

# In[ ]:


from sklearn.neighbors import KNeighborsRegressor
KNN_model = KNeighborsRegressor(n_neighbors=5)
KNN_model.fit(X_train, y_train)


# In[ ]:


print('Training Accuracy for KNN is: ')
KNN_model.score(X_train,y_train)


# In[ ]:


prediction_KNN=KNN_model.predict(X_test)


# In[ ]:


#Prediction Performance using R-squared
print("R2 score for ETP Prediction using KNN is:")
print(r2_score(y_test, prediction_KNN))


# In[ ]:


# actual vs prediction graph 
import matplotlib.pyplot as plt
fig, ax = plt.subplots()
ax.scatter(y_test, prediction_KNN)
ax.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'k--')
ax.set_xlabel('Measured ETP KNN Regression')
ax.set_ylabel('Predicted ETP KNN Regression')
plt.show()


# # Decision Tree

# In[ ]:


from sklearn.tree import DecisionTreeRegressor
DT_model = DecisionTreeRegressor(criterion='mse',random_state=0,min_samples_split=5,min_samples_leaf=2)
DT_model.fit(X_train, y_train),


# In[ ]:


print('Training Accuracy for Decision Tree model is: ')
DT_model.score(X_train,y_train)


# In[ ]:


prediction_DT=DT_model.predict(X_test)


# In[ ]:


#Prediction Performance using R-squared
print("R2 score for ETP Prediction using Decision Tree is:")
print(r2_score(y_test, prediction_DT))


# In[ ]:


# actual vs prediction graph 
import matplotlib.pyplot as plt
fig, ax = plt.subplots()
ax.scatter(y_test, prediction_DT)
ax.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'k--')
ax.set_xlabel('Measured ETP Decision Tree Regression')
ax.set_ylabel('Predicted ETP Decision Tree Regression')
plt.show()


# # XGBoost Regression

# In[ ]:


#pip install xgboost


# In[ ]:


import xgboost
model_xgb = xgboost.XGBRegressor()
model_xgb.fit(X_train, y_train)


# In[ ]:


print('Training Accuracy for XGBoost model is: ')
model_xgb.score(X_train,y_train)


# In[ ]:


prediction_XGB=model_xgb.predict(X_test)


# In[ ]:


#Prediction Performance using R-squared
print("R2 score for ETP Prediction using XGBoost is:")
print(r2_score(y_test, prediction_XGB))


# In[ ]:


# actual vs prediction graph 
import matplotlib.pyplot as plt
fig, ax = plt.subplots()
ax.scatter(y_test, prediction_XGB)
ax.plot([y_test.min(), y_test.max()], [y_test.min(), y_test.max()], 'k--')
ax.set_xlabel('Measured ETP XGBoost Regression')
ax.set_ylabel('Predicted ETP XGBoost Regression')
plt.show()


# In[ ]:
X.to_csv("Data_With_ETP_variables.csv")

Regression_Data['ETP']=X['ETP']

Regression_Data.to_csv("Data_With_All_variables.csv")

"""


