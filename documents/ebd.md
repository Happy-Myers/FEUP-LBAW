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


---


## A5: Relational Schema, validation and schema refinement

This artifact contains the Relational Schema obtained from the Conceptual Data Model.

### 1. Relational Schema

The Relational Schema includes the relation schemas, attributes, domains, primary keys, foreign keys and other integrity rules: UNIQUE, DEFAULT, NOT NULL, CHECK.  
Relation schemas are specified using a textual compact notation. 


| Relation reference | Relation Compact Notation                        |
| ------------------ | ------------------------------------------------ |
| R01                | user (<u>id</u>, name __NN__, phoneNumber __UK__ __NN__, email __UK__ __NN__, password __NN__, credits __NN__, permissions __NN__)                    |
| R02                | address (<u>id</u>, productId -> product, street __NN__, city __NN__, country __NN__, postalCode __NN__)
| R03                | product (<u>id</u>, name __NN__, price __NN__ __CK__ > 0, photo, score __NN__, description __NN__)
| R04                | platform (<u>id</u>, name __NN__, productId -> product) |
| R05                | category (<u>id</u>, name __NN__, productId -> product) |
| R06                | review (<u>id</u>, productId -> product, userId -> user, score __NN__ __CK__ 0 >= 5, comment) |
| R07                | reviewVote (<u>id</u>, reviewId -> review, userId -> user, score __NN__) |
| R08                | cart (<u>id</u>, productId -> product, userId -> user, quantity __NN__ __CK__ > 0) |
| R09                | wishlist (<u>id</u>, productId -> product, userId -> user) |
| R10                | purchase (<u>id</u>, userId -> user, date __NN__ __CK__ >= TODAY, total __NN__ __CK__ > 0, deliveryProgress) |
| R1                | faq (<u>id</u>, question __NN__, answer __NN__)

Legend:

* UK = UNIQUE KEY
* NN = NOT NULL
* DF = DEFAULT
* CK = CHECK

### 2. Domains

Specification of additional domains:

| Domain Name | Domain Specification           |
| ----------- | ------------------------------ |
| Today	      | DATE DEFAULT CURRENT_DATE      |
| deliveryProgress    | ENUM ('Processing', 'Shipped', 'Delivered') |
| userPermission    | ENUM ('User', 'Admin') |

### 3. Schema validation

To validate the Relational Schema obtained from the Conceptual Data Model, all functional dependencies are identified and the normalization of all relation schemas is accomplished. 

| **TABLE R01**   | user               |
| --------------  | ---                |
| **Keys**        | { id }, { email }, { username }, { NIF }  |
| **Functional Dependencies:** |       |
| FD0101          | id → {name, username, email, password, NIF, picture, admin} |
| FD0102          | email → {id, name, username, password, NIF, picture, admin} |
| **NORMAL FORM** | BCNF               |

Given that all the relations are in the Boyce-Codd Normal Form (BCNF), the relational schema is also in the BCNF. Therefore, the schema does not need to be further normalised.  


---


## A6: Indexes, triggers, transactions and database population

This artifact displays the database workload, integral for managing the performance of the platform; indexes, integral for improving the performance of select queries; triggers, which automate tasks on the database; transactions, which assure data integrity during operations; and the database schema.

### 1. Database Workload

| **Relation reference** | **Relation Name** | **Order of magnitude**        | **Estimated growth** |
| --- | --- | --- | --- |
