# Generated by Django 5.1.6 on 2025-02-28 13:10

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('manager', '0007_remove_reservation_email_reservation_user_id'),
    ]

    operations = [
        migrations.RenameField(
            model_name='reservation',
            old_name='user_id',
            new_name='user',
        ),
    ]
