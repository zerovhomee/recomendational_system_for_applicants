# Пример на Flask
from flask import Flask, request, jsonify
from test import test

app = Flask(__name__)


@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    prediction = test(data)
    return jsonify({'prediction': prediction})

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000)