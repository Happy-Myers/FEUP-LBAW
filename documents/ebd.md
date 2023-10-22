# EDB: Database Specification Component

## A4: Conceptual Data Model

The Conceptual Data Model contains the identification and description of the entities and relationships that are relevant to the database specification. Therefore, a UML class diagram is used to represent the information.

### 1. Class diagram

The UML diagram in Figure 1 shows the main entities, their relationships, attributes and domains. The multiplicity of relationships are present too.

![](images/UML.jpg)

<figcaption align= "center">Figure 1: UML Class Diagram</figcaption></p>

### 2. Additional Business Rules

Additional business rules or restrictions are described in text as UML notes in the diagram or as independent notes in this section.

| Identifier | Description |
|-----------------|--------------------------|
| BR01 | The total value of a purchase must be the sum of price of the purchased products. |
| BR02 | Update products' score according to all existing reviews. |
| BR03 | A user can only review a product that he has purchased. |
| BR05 | A product must have its category's required properties filled in. |
| BR06 | If the administrator removes a product, it will be removed from every cart and wishlist. |
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
| R01                | users (<u>id</u>, name __NN__, phone_number __UK__ __NN__, email __UK__ __NN__, password __NN__, credits __NN__, permissions __NN__)                    |
| R02                | address (<u>id</u>, street __NN__, city __NN__, country __NN__, postal_code __NN__) |
| R03                | platform (<u>id</u>, name __NN__) |
| R04                | category (<u>id</u>, name __NN__) |
| R05                | product (<u>id</u>, name __NN__, price __NN__ __CK__ price > 0, photo, score __NN__, description __NN__, id_platform -> platform) |
| R06                | category_product (<u>id_category</u> -> category, <u>id_product</u> -> product) |
| R07                | review (<u>id</u>, id_product -> product, id_user -> users, score __NN__ __CK__ score > 0 and score <= 5, comment) |
| R08                | review_vote (<u>id</u>, id_review -> review, id_user -> users, vote __NN__) |
| R09                | cart (<u>id_product</u> -> product, <u>id_user</u> -> users, quantity __NN__ __CK__ quantity > 0) |
| R10                | wishlist (<u>id_product</u> -> product, <u>id_user</u> -> users) |
| R11                | purchase (<u>id</u>, id_user -> users, date NN DF Today, total __NN__ __CK__ total > 0, deliveryProgress) |
| R12                | faq (<u>id</u>, question __NN__, answer __NN__) |

Legend:

* UK = UNIQUE KEY
* NN = NOT NULL
* DF = DEFAULT
* CK = CHECK

### 2. Domains

Specification of additional domains:

| Domain Name | Domain Specification           |
| ----------- | ------------------------------ |
| deliveryProgress  | ENUM ('Processing', 'Shipped', 'Delivered') |
| userPermission    | ENUM ('User', 'Admin') |

### 3. Schema validation

To validate the Relational Schema obtained from the Conceptual Data Model, all functional dependencies are identified and the normalization of all relation schemas is accomplished. 

| **TABLE R01**   | User               |
| --------------  | ---                |
| **Keys**        | { id }, { email }, {phoneNumber}  |
| **Functional Dependencies:** |       |
| FD0101          | id → {name, phoneNumber, email, password, credits, permissions} |
| FD0102          | email → {id, name, phoneNumber, password, credits, permissions} |
| FD0103          | phoneNumber → {id, name, email, password, credits, permissions} |
| **NORMAL FORM** | BCNF               |

| **TABLE R02** | Address |
| ------------- | ------- |
| **Keys**      | {id}    |
| **Functional Dependencies:** |
| FD0201        | id -> {userId, street, city, country, postalCode} |
| **NORMAL FORM** | BCNF |


| **TABLE R03**   | Platform           |
| --------------  | ---                |
| **Keys**        | { id }, { name }   |
| **Functional Dependencies:** |       |
| FD0401          | id → { name } |
| FD0401          | name → { id } |
| **NORMAL FORM** | BCNF               |

| **TABLE R04**   | Category           |
| --------------  | ---                |
| **Keys**        | { id }, { name }   |
| **Functional Dependencies:** |       |
| FD0501          | id → { name } |
| FD0501          | name → { id } |
| **NORMAL FORM** | BCNF               |

| **TABLE R05**   | Product            |
| --------------  | ---                |
| **Keys**        | { id } |
| **Functional Dependencies:** |       |
| FD0301          | id → { name, price, photo, score, description, id_platform } |
| **NORMAL FORM** | BCNF               |

| **TABLE R06**   | CategoryProduct    |
| --------------  | ---                |
| **Keys**        | { id_category, id_product }   |
| **Functional Dependencies:** | none |
| **NORMAL FORM** | BCNF               |

| **TABLE R07**   | Review             |
| --------------  | ---                |
| **Keys**        | { id }   |
| **Functional Dependencies:** |       |
| FD0701          | id → { id_product, id_user, score, comment } |
| **NORMAL FORM** | BCNF               |

| **TABLE R08**   | ReviewVote         |
| --------------  | ---                |
| **Keys**        | { id }   |
| **Functional Dependencies:** |       |
| FD0801          | id → { id_review, id_user, score } |
| **NORMAL FORM** | BCNF               |

| **TABLE R09**   | Cart               |
| --------------  | ---                |
| **Keys**        | { id_product, id_user }   |
| **Functional Dependencies:** |       |
| FD0901          | id_product, id_user → { quantity } |
| **NORMAL FORM** | BCNF               |

| **TABLE 10** | Wishlist |
| ------------- | ------- |
| **Keys**      | {id_product, id_user} |
| **Functional Dependencies:** | none |
| **NORMAL FORM** | BCNF |

| **TABLE R11** | Purchase |
| ------------- | ------- |
| **Keys**      | {id}    |
| **Functional Dependencies:** |
| FD1101        | id -> {id_user, date, total, deliveryProgress} |
| **NORMAL FORM** | BCNF |

| **TABLE R12** | Faq |
| ------------- | ------- |
| **Keys**      | {id}    |
| **Functional Dependencies:** |
| FD1201        | id -> {question, answer} |
| **NORMAL FORM** | BCNF |

Given that all the relations are in the Boyce-Codd Normal Form (BCNF), the relational schema is also in the BCNF. Therefore, the schema does not need to be further normalised.  


---


## A6: Indexes, triggers, transactions and database population

### 1. Database Workload

> A study of the predicted system load (database load).
> Estimate of tuples at each relation.

| **Relation reference** | **Relation Name** | **Order of magnitude** | **Estimated growth** |
| ------------------ | ------------- | ------------------------- | -------- |
| RS01                | Platform        | tens | units per year |
| RS02                | Category        | dozens | units per year |
| RS03                | Cart        | thousands | hundreds per day |
| RS04                | Product        | thousands | tens per day |
| RS05                | Review        | thousands | tens per day |
| RS06                | ReviewVote        | thousands | tens per day |
| RS07                | User        | thousnds | dozens per day |
| RS08                | Address        | thounds | no growth |
| RS09                | FAQ        | tens | units per year |
| RS10                | Wishlist        | thousands | hundreds per day |
| RS11                | Purchase        | thousands | dozens per day |
