from flask import Flask, render_template, redirect, request
import pickle
import os
import numpy as np

app = Flask(__name__)

# ----> Load Model Safely
model_path = os.path.join(os.getcwd(), 'model.pkl')

if os.path.exists(model_path):
    model = pickle.load(open(model_path, 'rb'))
else:
    model = None  # Handle missing model file gracefully


# ----> Home Route
@app.route("/")
def home():
    return render_template("index.html", title="Home")


# ----> About Us Route
@app.route("/about")
def about():
    return render_template("aboutus.html", title="About Us")


# ----> Services Route
@app.route("/services")
def services():
    return render_template("services.html", title="Our Services")


# ----> Learn More Route
@app.route("/Learnmore")
def learnmore():
    return render_template("Learnmore.html", title="Learn More")


# ----> Contact Us Route
# @app.route("/contactus")  
# def contactus():
#     return redirect("http://localhost/contact.php")


# -----> ML Input Page Route
@app.route("/machinemodelpart")
def mlinput():
    return render_template("Prediction.html", title="Inputs")

#signup
@app.route("/signup")
def signup():
    return render_template("signup.html",title="Signup Page")

#------> Login Page
@app.route("/login")
def login():
    return render_template("login.html", title="Login")


# ----> Prediction Endpoint
@app.route('/predict', methods=['POST'])
def predict():
    if not model:
        return render_template("Prediction.html", prediction_text="Model file not found. Please upload 'model.pkl'.")

    # Get form data
    apname=request.form['appnamme']
    gender = request.form['gender']
    married = request.form['married']
    dependents = request.form['dependents']
    education = request.form['education']
    employed = request.form['employed']
    credit = float(request.form['credit'])
    area = request.form['area']
    ApplicantIncome = float(request.form['ApplicantIncome'])
    CoapplicantIncome = float(request.form['CoapplicantIncome'])
    LoanAmount = float(request.form['LoanAmount'])
    Loan_Amount_Term = float(request.form['Loan_Amount_Term'])

    # Gender
    male = 1 if gender == "Male" else 0

    # Married
    married_yes = 1 if married == "Yes" else 0

    # Dependents
    dependents_1 = 1 if dependents == '1' else 0
    dependents_2 = 1 if dependents == '2' else 0
    dependents_3 = 1 if dependents == '3+' else 0

    # Education
    not_graduate = 1 if education == "Not Graduate" else 0

    # Employed
    employed_yes = 1 if employed == "Yes" else 0

    # Property Area
    semiurban = 1 if area == "Semiurban" else 0
    urban = 1 if area == "Urban" else 0

    # Calculate total income
    Total_income = ApplicantIncome + CoapplicantIncome

    # Make prediction
    prediction = model.predict([[LoanAmount, Loan_Amount_Term, credit, Total_income, 
                                 male, married_yes, dependents_1, dependents_2, dependents_3, 
                                 not_graduate, employed_yes, semiurban, urban]])

    # Convert prediction result
    prediction_text = f"Congratulations  {apname} , You Are Eligible For The Loan ✅" if prediction[0] == "Y" else f"Sorry {apname}, You Are Not Eligible For The Loan✖️"

    return render_template("Prediction.html", prediction_text=f"Status: {prediction_text}")


# ----> Run Flask App
if __name__ == "__main__":
    app.run(debug=True)
