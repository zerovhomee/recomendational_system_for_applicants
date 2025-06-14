from langchain.document_loaders import DirectoryLoader, TextLoader
loader = DirectoryLoader(
    '/home/zerovhomee/recomendational_system/ML+API_python/specialties', 
    glob="*.txt", 
    loader_cls=TextLoader,
    loader_kwargs={'encoding': 'utf-8'}
)
document = loader.load()

from sentence_transformers import SentenceTransformer
model = SentenceTransformer('paraphrase-multilingual-MiniLM-L12-v2')
texts = [doc.page_content for doc in document]
embeddings = model.encode(texts, normalize_embeddings=True)

from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
student_text = """
Мне нравится работать с ИИ. Также мне немного нравится математика, я бы хотел писать на языке python
"""

answer_dict = {}

def model_recomendation(student_text):

    student_embedding = model.encode(student_text, normalize_embeddings=True)

    similarities = cosine_similarity(
        [student_embedding],  
        embeddings           
    )

    similarity_scores = similarities[0]
    top = np.argsort(similarity_scores)[::-1]

    # Создаем список для хранения результатов
    results = []

    for idx in top:
        # Формируем строку с результатом
        result_str = f"{texts[idx][:texts[idx].find("\n")]}".strip()
        result_int = round(float(similarity_scores[idx]), 4)

        answer_dict[result_str] = result_int
        #results.append(result_str)

    # Теперь все результаты хранятся в переменной results
    # Можно объединить в одну строку:
    #combined_results = "\n".join(results)

    return answer_dict

print(model_recomendation(student_text))