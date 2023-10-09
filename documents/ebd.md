# EDB: Database Specification Component

## A4: Conceptual Data Model

The Conceptual Data Model contains the identification and description of the entities and relationships that are relevant to the database specification. Therefore, a UML class diagram will be presented to document the model.

The class diagram is developed by starting to include only the classes and its relationships in order not to overload the diagram too early in the process. In the following iterations additional detail is included, namely: class attributes, attribute domains, multiplicity of associations, and additional restrictions in OCL.

### 1. Class diagram

![](imagens/UML.png)

<figcaption align= "center">Figure 1: UML Class Diagram</figcaption></p>

The UML diagram in Figure 1 presents the main entities, their relationships, attributes and their domains, and the multiplicity of relationships.

### 2. Additional Business Rules

Additional business rules or restrictions are described in text as UML notes in the diagram or as independent notes in this section.


| Identifier | Description |
|-----------------|--------------------------|
| BR01 | The total value of a purchase must be the sum of price of the purchased products. |
| BR02 | Update books' score according to all existing reviews. |

## A5