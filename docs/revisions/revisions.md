# Atelier révisions S06E03, vendredi 08 janvier


Sujets : 

- SQL -> DONE
- SQL dans MVC -> DONE
- INSERT -> DONE
- UPDATE -> DONE
- Plus d'infos sur la sécu -> DONE
- SQLMap -> DONE
- Static -> DONE
- une berceuse avec chorégraphie ->
  

## SQL

```
INSERT INTO `nomTable` (columName1, columName2,...) VALUES ('String Value', intValue, 'StringValue')
```

exemple d'utilisation : 

```
INSERT INTO `product` (
            name, 
            description, 
            picture,
            price,
            rate,
            status,
            brand_id,
            category_id,
            type_id
            )
        VALUES (
            'produit manuel', 
            'blabla balbla' ,
            'http://balbal.com/image.jpg',
            100,
            2,
            2,
            1,
            1,
            1
            )
```

```
UPDATE `tableName`
SET 
    columnName1 = 'string value',
    columnName2 = intValue
WHERE CONDITION
```

```
UPDATE `product`
SET 
    name = 'Emanuel hihihi'
WHERE id = 30
```


## Sécu

références : 
- exploit-db.com (section Papers, GHDB)
- shodan.io


## Static






