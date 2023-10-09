# EDB: Database Specification Component

## A4: Conceptual Data Model

The Conceptual Data Model contains the identification and description of the entities and relationships that are relevant to the database specification. Therefore, a UML class diagram is used to represent the information.

### 1. Class diagram

The UML diagram in Figure 1 shows the main entities, their relationships, attributes and domains. The multiplicity of relationships are present too.

![](imagens/UML.png)

<figcaption align= "center">Figure 1: UML Class Diagram</figcaption></p>

### 2. Additional Business Rules

Additional business rules or restrictions are described in text as UML notes in the diagram or as independent notes in this section.

| Identifier | Description |
|-----------------|--------------------------|
| BR01 | The total value of a purchase must be the sum of price of the purchased products. |
| BR02 | Update products' score according to all existing reviews. |
| BR03 | A user can only review a product that he has purchased. |
| BR04 | A product's price must be a positive value. |
| BR05 | A product must have its platform's required properties filled in. |
| BR06 | If the administrator removes a product, it will be removed from every cart and wishlist. |
| - | - |
| **BR07** | **A purchase's address must have to be in the user's addresses book.** |
| **BR08** | **If the category has no products, it can not be added to the navigation bar. But, if that same category is in the navigation bar, it will be removed.** |


## A5