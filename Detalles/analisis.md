# Requisitos del proyecto

El proyecto nos pide refactorizar una clase que hace muchas cosas, la clase `MakeDrinkCommand`.

Esta clase se encarga de leer los parámetros de entrada, validar los parámetros, mostrar el mensaje de salida y calcular el dinero ganado con cada tipo de bebida.

El objetivo es mejorar el código para que sea más reutilizable, mantenible y testeable, siguiendo principios como Clean Code, SOLID, Decoupling, Design Patterns, Error Handling, Unit Testing, TDD y Hexagonal Architecture.

Además, se nos pide implementar una nueva funcionalidad para calcular el dinero ganado con cada tipo de bebida.

## Análisis de la clase `MakeDrinkCommand`

Este archivo es un comando de consola que se encarga de preparar una bebida. En que tiene 4 argumentos principales:

1. drinkType: string
2. money: float
3. sugars: int
4. extraHot: boolean

## Planificación de la refactorización

Podemos dividir en 4 clases diferentes para seguir los principios SOLID:

1. Clase de DrinkType
2. Clase de Money
3. Clase de Sugars
4. Clase de ExtraHot

Y tener otro file para los mensajes de salida.

## Creación de un nuevo comando para saber el dinero ganado con cada tipo de bebida

Podemos crear un nuevo comando de consola que se encargue de mostrar el dinero ganado con cada tipo de bebida.

Que el commando sea:
```
app:sales-report

```

### Creacion de Json para guardar los datos

Creación de un sales.json para guardar los datos de las ventas que se hizo y que nos de el dinero ganado por cada bebida y el total.

### Testeo

Creamos unas mini pruebas para ver que todo funcione correctamente.

### Herramientas utilizadas

1. GitHub Copilot
2. Google Antigravity
3. ChatGpt




