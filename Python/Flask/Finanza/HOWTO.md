
# project creation

- mkdir finanza/
- cd finanza/

# virtual env set

- sudo apt install python3.11-venv
- python3 -m venv venv
- source venv/bin/activate
- pip install flask mysql-connector-python

# DB creation

[ from MySQL ]

    CREATE DATABASE IF NOT EXISTS `finanza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    
    USE `finanza`;
    
    DROP TABLE IF EXISTS `overview`;

    CREATE TABLE `overview` (
      `id` int(11) NOT NULL,
      `name` varchar(255) NOT NULL,
      `ref_year` varchar(255) NOT NULL,
      `ref_month` varchar(255) NOT NULL,
      `amount` float NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
      `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    ALTER TABLE `overview`
     ADD PRIMARY KEY (`id`);

    ALTER TABLE `overview`
     MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

# project files creation

- mkdir templates assets assets/js assets/css assets/img
- touch app.py config.py templates/overview.html assets/js/custom.js assets/css/custom.css
- nano config.py

        import mysql.connector

        def get_db_connection():
            return mysql.connector.connect(
                host='localhost',
                user='root',
                password='',
                database='finanza'
            )

# finanza app creation

- nano app.py

        from flask import Flask, render_template, request
        from config import get_db_connection

        app = Flask(__name__)


        @app.route("/")
        def home():
            conn = get_db_connection()
            cursor = conn.cursor()
            cursor.execute("SELECT * FROM overview")
            outcomes = cursor.fetchall()
            cursor.close()
            conn.close()
            return render_template("overview.html", outcomes=outcomes)


        @app.route("/add_outcome", methods=["POST"])
        def add_outcome():

            name = request.form["name"]
            ref_year = request.form["ref_year"]
            ref_month = request.form["ref_month"]
            amount = request.form["amount"]

            conn = get_db_connection()
            cursor = conn.cursor()
            cursor.execute(
                "INSERT INTO overview (name, ref_year, ref_month, amount) VALUES (%s, %s, %s, %s)",
                (name, ref_year, ref_month, amount),
            )
            conn.commit()
            cursor.close()
            conn.close()
            return "outvìcome has been added successfully"


        if __name__ == "__main__":
            app.run(debug=True)


- nano templates/overview.html

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Finanza</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <script src="assets/js/jquery.js"></script>
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <script src="assets/js/bootstrap.js"></script>

            <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
            <link rel="stylesheet" href="assets/css/custom.css">
        </head>

        <body>
            <h1>Finanza</h1>
            <form action="/add_outcome" method="post">
                <input type="text" name="name" placeholder="Outcome name" required>
                <input type="text" name="ref_year" placeholder="Outcome ref_year" required>
                <input type="text" name="ref_month" placeholder="Outcome ref_month" required>
                <input type="text" name="amount" placeholder="Outcome amount" required>
                <button type="submit">Add Outcome</button>
            </form>
            <h2>Outcomes List:</h2>
            <ul>
                {% for outcome in outcomes %}
                <li>{{ outcome }}</li>
                {% endfor %}
            </ul>
        </body>

        </html>

# project execution

- python3 app.py [ from App root ]