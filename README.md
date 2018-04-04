# Тестовое задание

Необходимо создать веб-сервис, который будет отвечать за автоматическое 
распознавание и вставку видео контента по урл. Что-то похожее существует во ВК - 
там при написании поста можно вставить ссылку на видео и оно будет автоматически 
распознано.  

На вход сервис должен принимать один параметр:  
- урл к видео ИЛИ его html код для вставки  

На выход сервис отдает:  
- заголовок видео  
- html код для вставки видео  
- описание (опционально)  
- фото для превью (опционально)  

1. Ответы сервис должен давать в формате JSON.  
1. Сервис должен быть построен по архитектуре REST.  
1. Код должен быть написан в ОО стиле, быть чистым и хорошо читаться  
1. Сервис должен быть легко расширяем для поддержки новых поставщиков видео 
и самых разных форматов урл  
1. Сервис должен поддерживать следующие источники видео  

YouTube  
Видео@Mail.ru  
Яндекс.Видео  
Rutube  
ВКонтакте  
Vimeo  

Минимально необходимо сделать YouTube + еще один любой другой источник и 
продемонстрировать легкость добавления любого нового источника видео. 
Если будут сделаны все источники, то это будет дополнительным плюсом. 
Наличие тестов будет еще одним большим плюсом.  

## Проверка приложения

Для проверки приложения нужно перейти на главную страницу сервиса (/).  
Ввести url или embeded code видео и нажать на кнопку "Распознать".  

Второй вариант - запустить тесты, набрав команду phpunit, находясь в корневой 
папке приложения.
