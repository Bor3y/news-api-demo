## Simple api Demo

simple REST API for news. 
Each entity contain the following information: id, date, title, short description, text.
API results should be sortable by date and/or title. 
API results may be filtered by date and/or title.

#### Running steps 

- ``` composer install ```
- ``` php artisan migrate ```
- ``` php artisan db:seed ```
- ``` php artisan serve ```

#### API List

-  GET ``` (api/news) ```  

     return news (pagination, filters, sort)

 |Key|Type|Description|
 | :---: | :----: | :---: |
 |Sort	|array	|Property to sort by, e.g. 'title'|
 |Limit	|integer	|Limit of resources to return|
 |Page	|integer	|For use with limit|
 |Filter_groups |array	|Array of filter groups. See below for syntax.|
    
 [for more info see](https://github.com/esbenp/bruno)   
 
 we provide example using json but this must be converted to url query 
 
 ##### Example Json version
 
   ```json
    {
      "Page": 1,
      "limit": 5,
      "sort":[
        {
          "key": "title",
          "direction": "ASC"
        }
      ],
      "filter_groups": [
        {
          "or": false,
          "filters": [
            {
              "key": "title",
              "value": "or",
              "operator": "ct"
            },
            {
              "key": "date",
              "value": "2000-01-01",
              "operator": "gt"
            }
          ]
        }
      ]
    }
   ```
    
   ##### Example url version
   ```json 
    Page=1&limit=5&sort%5B0%5D%5Bkey%5D=date&sort%5B0%5D%5Bdirection%5D=ASC&filter_groups%5B0%5D%5Bor%5D=true&filter_groups%5B0%5D%5Bfilters%5D%5B0%5D%5Bkey%5D=title&filter_groups%5B0%5D%5Bfilters%5D%5B0%5D%5Bvalue%5D=or&filter_groups%5B0%5D%5Bfilters%5D%5B0%5D%5Boperator%5D=ct&filter_groups%5B0%5D%5Bfilters%5D%5B1%5D%5Bkey%5D=date&filter_groups%5B0%5D%5Bfilters%5D%5B1%5D%5Bvalue%5D=2000-01-01&filter_groups%5B0%5D%5Bfilters%5D%5B1%5D%5Boperator%5D=gt
   ```
   
   -  GET  ``` (api/news/{id}) ```
    
    return one element of Id
    
   -  POST  ``` (api/news/) ```
   
        create news
   
   ```json
    {
    	"title" : "Ut labore qui voluptate",
    	"short_description": "Quod consequatur earum in itaque velit nihil et at. Doloribus cumque deleniti iste reprehenderit cum rerum aut porro. Ut optio facilis tempore. Laborum et ut magni tenetur.",
    	"text": "<html><head><title>Non possimus aut sunt.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">accusantium</label><input type=\"text\" id=\"username\"><label for=\"password\">sit</label><input type=\"password\" id=\"password\"></form><div class=\"voluptatem\"><div class=\"veritatis\"></div><div class=\"et\"></div><div id=\"80326\"></div><div class=\"voluptas\"></div></div></body></html>\n"
    }
   ```
   
   -  PUT  ``` (api/news/{id}) ```
   
   ```json
       {
       	"date": "1983-02-01 00:00:00"
       }
   ``` 
   - DELETE  ``` (api/news/{id}) ```
      
      delete news of id


