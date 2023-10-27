# EAP: Architecture Specification and Prototype

## A7: Web Resources Specification

This artifact describes the web api that will be developed, remarking the resources needed, Its properties and JSON responses. This api includes creating, reading, updating and deleting operations for each resource.

### 1. Overview

| Module ID | Description |
| --------- | ----------- |
| M01: Authentication and Profile | Manages web resources related to user authentication and user profile information, including basic user details and addresses. |
| M02: Products and Categories | Handles web resources for searching, filtering, and listing available products for users. |
| M03: Management Area | Administers web resources for website management, allowing the viewing and editing of purchases, managing properties, categories, and FAQs. |
| M04: Product and Reviews | Controls web resources concerning products and their associated reviews. It also covers adding and editing product details. |
| M05: Static Pages | Oversees web resources responsible for static content and pages, including 'about,' 'contact,' and 'FAQ' pages. |
| M06: Cart and Wishlist | Manages web resources for users' shopping cart and wishlist. |

### 2. Permissions

This segment describes the permissions used in the last section (modules) to settle the conditions of access to resources.

| Identifier | Name | Description |
|------------|------|-------------|
| VST | Visitor | An unauthenticated user. |
| USR | User | An authenticated user. |
| OWN | Owner | The owner of a post, comment, profile. |
| ADM | Administrator | Platform administrator. |

### 3. OpenAPI Specification

> OpenAPI specification in YAML format to describe the vertical prototype's web resources.

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