from ucimlrepo import fetch_ucirepo 
import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
import seaborn as sns
from sklearn.preprocessing import MinMaxScaler
wine_quality = fetch_ucirepo(id=186) 

X = wine_quality.data.features
y = wine_quality.data.targets 
df = pd.concat([X, y], axis=1)

describe = df.describe()
describe

df = df.drop_duplicates() 

df.isnull().sum()

def del_emissions(feature_name, data):
    q_low = df[feature_name].quantile(0.25)
    q_high = df[feature_name].quantile(0.75)

    tentacle_length = q_high - q_low
    upper_tentacle = q_high + 1.5 * tentacle_length
    lower_tentacle = q_low - 1.5 * tentacle_length

    new_data = data[(data[feature_name] > lower_tentacle) &
                    (data[feature_name] < upper_tentacle)]

    sns.boxplot(y = new_data[feature_name])
    plt.show()
    return new_data
print(df.shape)
for col in df:
    if col == 'quality':
        continue
    df = del_emissions(col, df)
print(df.shape)

for col in df:
    variability = df[col].value_counts(normalize = True).max()
    if variability > 0.8:
        df = df.drop(col, axis = 1)

for col in df:,
variability = df[col].value_counts(normalize = True),
variability_rare = variability[variability < 0.01].index,
df[col] = df[col].apply(lambda x: 'Other' if x in variability_rare else x),
display(df)

df["alcohol_densityratio"] = df["alcohol"] / df["density"]

y = df["quality"]
X = df.drop("quality", axis = 1)
features_names = list(X.columns)
scaler = MinMaxScaler()
scaler.fit(X)
scaled_X = scaler.transform(X)
scaled_df = pd.DataFrame(scaled_X, columns = features_names)
scaled_df["quality"] = y.values

y = scaled_df["quality"]