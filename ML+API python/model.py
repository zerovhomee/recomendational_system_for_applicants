from langchain.document_loaders import DirectoryLoader, TextLoader
loader = DirectoryLoader(
    'C:/Users/mrtar/Desktop/specialties', 
    glob="*.txt", 
    loader_cls=TextLoader,
    loader_kwargs={'encoding': 'utf-8'}
)
document = loader.load()

from sentence_transformers import SentenceTransformer
model = SentenceTransformer('all-mpnet-base-v2')
texts = [doc.page_content for doc in document]
embeddings = model.encode(texts, normalize_embeddings=True)

from sklearn.metrics.pairwise import cosine_similarity
import numpy as np
student_text = """
Мне нравится работать с ИИ. Также мне немного нравится математика, я бы хотел писать на языке python
"""
student_embedding = model.encode(student_text, normalize_embeddings=True)

similarities = cosine_similarity(
    [student_embedding],  
    embeddings           
)

similarity_scores = similarities[0]
top = np.argsort(similarity_scores)[::-1][:3]

for idx in top:
    print(f"{texts[idx][:100]}...")
    print(f"Сходство: {similarity_scores[idx]:.4f}")
    print()

