

#   Progect creation

- mkdir project
- cd project
- python3 -m venv venv

#   Project activation

- source venv/bin/activate
- pip install django
- pip install djangorestframework
- django-admin startproject project .
- django-admin startapp projectApp
- python3 manage.py migrate
- python3 manage.py createsuperuser
- python3 manage.py runserver

#   Project population

- mkdir static
- mkdir static/css
- mkdir static/js
- mkdir templates
- touch static/css/custom.css
- touch static/js/custom.js
- touch templates/main.html

#   Project files update

<u>in <strong>/project/urls.py</strong></u>

    from django.contrib import admin
    from django.urls import path, include
    from django.views.generic.base import TemplateView

    urlpatterns = [
        path('admin/', admin.site.urls),
        path('accounts/', include('django.contrib.auth.urls')),
        path("", TemplateView.as_view(template_name="main.html"), name="main"),
        path("admin/", TemplateView.as_view(template_name="home.html"), name="admin"),
    ]

<u>in <strong>/project/settings.py</strong></u>

    ...

    INSTALLED_APPS = [
        ...
        'rest_framework',
    ]

    ...

    TEMPLATES = [
        {   
            ...
            'DIRS': [BASE_DIR / "templates"],
            ...

        ...

    STATICFILES_DIRS = [
        BASE_DIR / "static",
    ]

    ...

    LOGIN_REDIRECT_URL = "main"
    LOGOUT_REDIRECT_URL = "main"

<br /><br /><u>edit /templates/main.html </u>

    {% load static %}
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Python Django Project</title>
            <link rel="stylesheet" href="{% static 'css/custom.css'%}" />

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
            
        </head>
        <body>
            <h1>Python Django Project</h1>
        </body>
    </html>

    <script src="{% static 'js/custom.js'%}"></script>

- <u>edit static/css/custom.css</u>
- <u>edit static/js/custom.js</u>

#   Project RUN

- source venv/bin/activate
- python3 manage.py runserver

