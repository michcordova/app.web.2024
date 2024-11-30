from django.urls import path
from . import views

urlpatterns = [
    path('listado_articulos/', views.listar_art, name='listado_articulos'),
    path('listado_categorias/', views.listar_cat, name='listado_categorias')
]
