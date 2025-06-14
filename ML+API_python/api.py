# Пример на Flask
from flask import Flask, request, jsonify
from form import add_probability_to_the_specialty, get_specilaties_score
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
        specialities_probability = model_recomendation(text_data)
    
        print(specialities_probability)
    
        languages = tuple(data.get("Какой язык программирования тебе ближе всего?", ()))
        roles = tuple(data.get("Какую роль тебе комфортнее всего взять в команде?", ()))
        actions = tuple(data.get("С кем тебе проще общаться?", ()))
        films = tuple(data.get("Что тебе больше всего нравится в фильмах/сериалах о технологиях?", ()))

        input_form = {"Какой язык программирования тебе ближе всего?":
            languages,
            "Какую роль тебе комфортнее всего взять в команде?":
            roles,
            "С кем тебе проще общаться?":
            actions,
            "Что тебе больше всего нравится в фильмах/сериалах о технологиях?":
            films

        }
        print(input_form)

        specialities_scores = get_specilaties_score(input_form)

        result = add_probability_to_the_specialty(specialities_probability, specialities_scores)

        return jsonify({'prediction': result})

    
        
if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000)