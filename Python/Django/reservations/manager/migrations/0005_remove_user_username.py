# Generated by Django 5.1.6 on 2025-02-28 11:18

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('manager', '0004_remove_reservation_user_reservation_email'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='user',
            name='username',
        ),
    ]
