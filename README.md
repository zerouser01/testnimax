Используя фреймворк Laravel, реализуй RESTful api.

- Реализовать сущности
    - Товары
    - Категории
    - Товар-Категория
- Реализовать выдачу данных в формате json по RESTful
    - Создание Товаров (у каждого товара может быть от 2 до 10 категорий)
        - [POST] http://localhost:8000/products
    - Редактирование Товаров
        - [PUT] [http://localhost:8000/products/{product_id}](http://localhost:8000/products/%7Bproduct_id%7D)
    - Удаление товаров (товар помечается как удаленный)
        - [DELETE] [http://localhost:8000/products/{product_id}](http://localhost:8000/products/%7Bproduct_id%7D)
    - Создание категорий
        - [POST] http://localhost:8000/category
    - Удаление категорий (вернуть ошибку если категория прикреплена к товару)
        - [DELETE] [http://localhost:8000/category/{category_id}](http://localhost:8000/category/%7Bcategory_id%7D)
    - Получение списка товаров
        - [GET] http://localhost:8000/products
        - Имя / по совпадению с именем
            - [GET] http://localhost:8000/products?name=Test
        - id категории
            - [GET] [http://localhost:8000/products?category_id={category_id}](http://localhost:8000/products?category_id=%7Bcategory_id%7D)
        - Название категории / по совпадению с категорией
            - [GET] http://localhost:8000/products?category_name=Test
        - Цена от – до
            - [GET] http://localhost:8000/products?prices=101,120
        - Опубликованные – да / нет
            - [GET] http://localhost:8000/products?is_published=0
        - Не удаленные
