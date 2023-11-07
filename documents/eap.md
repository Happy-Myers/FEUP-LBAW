# EAP: Architecture Specification and Prototype

## A7: Web Resources Specification
Project modules are identified and briefly described to organize how they are presented in the yaml document.

### 1. Overview

| Module | Description |
| --- | --- |
| **M01: Authentication and Individual Profile** | Web resources associated with user authentication and individual profile management. Includes the following system features: login/logout, registration, credential recovery, view and edit personal profile information. |
| **M02: Products** | Web resource associated with the search and listing of the products available to the user. |
| **M03: Reviews and Wishlist** | Web resources associated with reviews and wishlist. Includes the following system features: view review, add reviews, edit reviews and delete reviews; add items to wish list and remove items from the wish list. |
| **M04: Cart** | Web resources associated with the management of the cart. |
| **M05: Static pages** | Static pages like: about us, main features and contacts. |
| **MO06: Management Area** | Web resources associated with website management, specifically: view and edit purchases, view, edit, add and delete properties, view, edit, add and delete categories and view, add and delete faqs. |

### 2. Permissions

|  |  |  |
| -- | -- | -- |
| **PUB** | Public | Users without privileges |
| **USR** | User | Authenticated users |
| **OWN** | Owner | User that are owners of the information |
| **ADM** | Administrator | System administrators |

### 3. OpenAPI Specification


> Link to the `a7_openapi.yaml` file in the group's repository.


```yaml
openapi: 3.0.0

...
```

---


## A8: Vertical prototype

> Brief presentation of the artifact goals.

### 1. Implemented Features

#### 1.1. Implemented User Stories

> Identify the user stories that were implemented in the prototype.  

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US01                 | Name of the user story | Priority of the user story | Description of the user story |

...

#### 1.2. Implemented Web Resources

> Identify the web resources that were implemented in the prototype.  

> Module M01: Module Name  

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R01: Web resource name | URL to access the web resource |

...

> Module M02: Module Name  

...

### 2. Prototype

> URL of the prototype plus user credentials necessary to test all features.  
> Link to the prototype source code in the group's git repository.  


---


## Revision history

Changes made to the first submission:
1. Item 1
1. ..

***
GROUPYYgg, DD/MM/20YY
 
* Group member 1 name, email (Editor)
* Group member 2 name, email
* ...