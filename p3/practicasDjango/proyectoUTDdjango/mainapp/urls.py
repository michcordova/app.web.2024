from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name="inicio"),
    path('inicio/', views.index, name='index'),
    path('about/', views.about, name='acercade'),
    path('mision/', views.mision, name='mision'),
    path('vision/', views.vision, name='vision'),
    path('inicio-sesion/', views.incio_sesion, name='iniciosesion'),
    path('registro/', views.registro, name='registro'),
    path('cerrar-sesion/', views.cerrar_sesion, name='cerrarsesion'),
    path('articulos/', views.articulos, name='articulos'),
    path('categorias/', views.categorias, name='categorias')
]
