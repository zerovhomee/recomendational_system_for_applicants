# 📌 Recommendation System for Applicants of Ural Federal University Institute of Radioelectronics and Information Technologies

**🔗 Our site:** https://recsysrtf.ru/start

## 📝 **Description**  
This project is a **recommendation system** developed to help applicants of Ural Federal University Institute of Radioelectronics and Information Technologies (e.g., students, job seekers) find the best educational programs in institute based on their preferences, academic performance, and other relevant factors.  

### **Key Features**  
✅ **Semantic similarity** (for personalized matches). Model compares a user’s interests with program descriptions to suggest relevant options beyond keyword overlap.  
✅ **User-friendly interface** (web-based).  
✅ **Data-driven insights** (e.g., success probability, best-fit programs).  
✅ **Scalable architecture** (can be extended with more datasets).  

---

## 🛠 **Technologies Used**  
- **Backend:** Python (Flask), PHP(Laravel)  
- **Frontend:** HTML/CSS/JS, Bootstrap
- **Machine Learning:** Sentence-transformers model('paraphrase-multilingual-MiniLM-L12-v2') (for semantic similarity)
- **Database:** MySQL (for user data and program details)  
- **Deployment:** PythonAnywhere, REG.Ru host  

---

## 📊 **Dataset Structure**  
The system uses structured data, such as:   
- **Programs:** `program_id, name, description, possible future professions, subjects and employment at the institute, last year's passing score`  

---

## 🤖 **How the Recommendation System Works**  
1. **Getting data**  
   - The system receives the user's test results, as well as their preferences, hobbies, and other details they provided in the "About Me" section.   
   - The server sends this data to the model.

2. **Model's recommendation process**  
   - **Semantic similarity:** First it processes the text about their preferences.  
   - **Vector differences:** Then calculates similarity from the test results by computing vector differences.
   - **Addition:** It combines both scores, sends the result back to the server.

3. **Generating Recommendations on web-interface**  
   - For a given user, the system suggests top-`3` programs with predicted suitability scores and personalized recommendations.
   - In their personal account, the system retrieves data from the database about last year's admission scores and program descriptions. 

---



## 📧 **Contact**  
For questions or feedback:  
- **GitHub:** [@zerovhomee](https://github.com/zerovhomee)  
- **Email:** zerov.live@gmail.com 


### **Screenshot from the site**  
![изображение](https://github.com/user-attachments/assets/6b9861a5-d0e6-4bc8-83e3-009aee187201)
 

--- 
