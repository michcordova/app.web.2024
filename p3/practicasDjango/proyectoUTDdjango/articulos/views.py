from django.shortcuts import render
from django.contrib.auth.decorators import login_required  # quitar accesos a usuarios no loggeados
from articulos.models import Article, Category

# Create your views here.
@login_required(login_url='inicio')
def listar_art(request):

    # sacar los arículos de la base de datos:
    articulos = Article.objects.all()

    return render(request, 'articulos/listado_art.html', {
        'title': 'Artículos',
        'content': 'Listado de Aríticulos',
        'articulos': articulos
    })


@login_required(login_url='inicio')
def listar_cat(request):

    categorias = Category.objects.all()

    return render(request, 'categorias/listado_cat.html', {
        'title': 'Categorías',
        'content': 'Listado de Categorías',
        'categorias':categorias
    })