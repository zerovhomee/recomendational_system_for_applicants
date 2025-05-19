# Пример на Flask
from flask import Flask, request, jsonify
from model import model_recomendation
import json 

app = Flask(__name__)


@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    text = data['text']
    text_data = text['text']
    print(text_data)
    if data:
        prediction = model_recomendation(text_data)
    return jsonify({'prediction': prediction})

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000)