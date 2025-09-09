from flask import Flask, render_template_string, request

app = Flask(__name__)

HTML = """
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Selezione Menu</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h2 { color: #2c3e50; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 8px; }
        select { padding: 6px; font-size: 16px; }
        button { margin-top: 12px; padding: 8px 18px; font-size: 16px; }
    </style>
</head>
<body>
    <h2>Seleziona una voce di menu</h2>
    <form action="/selezione" method="post">
        <label for="menu">Menu:</label>
        <select name="menu" id="menu" required>
            <option value="">-- Scegli una voce --</option>
            <option value="voce1">Voce 1</option>
            <option value="voce2">Voce 2</option>
            <option value="voce3">Voce 3</option>
            <option value="voce4">Voce 4</option>
            <option value="voce5">Voce 5</option>
        </select>
        <br>
        <button type="submit">Conferma</button>
    </form>
    {% if scelta %}
        <h3>Hai selezionato: {{ scelta }}</h3>
    {% endif %}
</body>
</html>
"""

@app.route('/', methods=['GET'])
def index():
    return render_template_string(HTML)

@app.route('/selezione', methods=['POST'])
def selezione():
    scelta = request.form.get('menu')
    return render_template_string(HTML, scelta=scelta)

if __name__ == "__main__":
    app.run(debug=True)