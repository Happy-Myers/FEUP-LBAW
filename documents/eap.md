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
| **M06: Management Area** | Web resources associated with website management, specifically: view and edit purchases, view, edit, add and delete properties, view, edit, add and delete categories and view, add and delete faqs. |

### 2. Permissions

|  |  |  |
| -- | -- | -- |
| **PUB** | Public | Users without privileges |
| **USR** | User | Authenticated users |
| **OWN** | Owner | User that are owners of the information |
| **ADM** | Administrator | System administrators |

### 3. OpenAPI Specification

This section includes the [GameSpace OpenAPI](https://git.fe.up.pt/lbaw/lbaw2324/lbaw23154/-/blob/main/documents/a7_openapi.yaml?ref_type=heads).


```yaml
openapi: 3.0.0

...
```

---


## A8: Vertical prototype

The Vertical Prototype incorporates the implementation of features identified as essential in the common and theme requirement documents. With this information, we have realized all user stories prioritized as high, as detailed in the sections below.
The primary purpose of this artifact is to validate the presented architecture and provide us with foundational insights into the technologies employed in the project.
In adherence to best practices, the implementation is grounded in the code of the LBAW Framework, involving comprehensive work across all layers of the solution's architecture. The prototype encompasses the realization of page visualizations (such as home, profile, product, cart, wishlist and search pages), content manipulation operations (insertion, editing, and removal of addresses), and the incorporation of various error and success messages.

### 1. Implemented Features

#### 1.1. Implemented User Stories

For the vertical prototype we decided to implement all of the user stories that had priority set to high.

| User Story reference | Name                   | Priority                   | Description                   |
| -------------------- | ---------------------- | -------------------------- | ----------------------------- |
| US01 | Product Details | High | As a User, I want to be able to see the product details, so that I can see a detailed representation of it. |
| US02 | Search products | High | As a User, I want to be able to search for products, so that I can find what I'm looking for. |
| US14 | Sign-in | High | As a Visitor, I want to be able to authenticate into the system, so that I can access privileged information. |
| US15 | Sign-up | High | As a Visitor, I want to be able to register myself into the system, so that I can authenticate myself into the system. |
| US19 | Add to Shopping Cart | High | As an Authenticated User, I want to be able to add products to the shopping cart, so that I can buy them later. |
| US20 | Manage Shopping Cart | High | As an Authenticated User, I want to be able to manage my shopping cart, so that I can decide what I want to buy. |
| US21 | Log out | High | As an Authenticated User, I want to be able to log in and out of my account, so that I can protect my personal information and ensure no unauthorized access to my account. |
| US22 | View profile | High | As an Authenticated User, I want to be able to view my profile, so that I can see my personal data |
| US23 | Edit profile | High | As an Authenticated User, I want to be able to edit my profile, so I can alter my personal data |
| US24 | Delete account | High | As an Authenticated User, I want to be able to delete my account, so that I can remove my personal data from the site when I don’t want to use it anymore |
| US42 | Review a game | High | As a Buyer, I want to be able to write a review of a game that I have bought, so that other users can see what I thought of the game. |
| US43 | Give games a score | High | As a Buyer, I want to be able to rate a game from 1 to 5, so that other users have an idea of the quality of the game. |
| US44 | Delete a game score | High | As a Buyer, I want to be able to  delete the score I’ve given to a game, so that other users don’t see it. |
| US45 | Check purchase history | High | As a Buyer, I want to be able to view my purchase history, so that I can check my past purchases. |
| US46 | Delete a game review | High | As a Buyer, I want to be able to  delete a previous review I wrote about a game, so that other users can't read it. |

<figcaption align= "center">Table: vertical prototype implemented user stories </figcaption>

#### 1.2. Implemented Web Resources

#### Module M01: Authentication and Individual Profile 

| Web Resource Reference         | URL                            |
| ------------------------------ | ------------------------------ |
| R101: Login Form	             | GET /login                     |
| R102: Login Action	        | POST /users/authenticate       |
| R103: Logout Action            | POST /logout                   | 
| R104: Register Form            | GET /register                  | 
| R105: Register Action	        | POST /register                 |
| R106: View User profile        | GET /users/{user}              |
| R107: Edit User profile page   | GET /users/edit                |
| R108: Edit User profile action | PUT /users/edit                |
| R109: Soft Delete Account	   | DELETE /users                  |
| R110: Save Address In Profile  | POST /addresses                |
| R111: Update Address In Profile| PUT /addresses/{address}       |
| R112: Remove Address In Profile| DELETE /addresses/{address}    |

<figcaption align= "center">Table: authentication and profile's implementation </figcaption>

#### M02: Products

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R201: View All Products | GET / |
| R202: View Product | GET /products/{product} |
| R203: Search Products | GET /?search={text} |
| R204: Filter By Category | GET /?category={category} |


<figcaption align= "center">Table: products' implementation </figcaption>

#### M03: Reviews and Wishlist

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R301: Review a game | POST /reviews |
| R302: Delete a game review | DELETE /reviews/{review} |
| R303: View Wishlist | GET /wishlist |
| R304: Add Product to Wishlist | POST /wishlist/{product} |
| R305: Remove Product to Wishlist | DELETE /wishlist/{product} |

<figcaption align= "center">Table: game reviews and wishlist's implementation </figcaption>

#### M04: Cart

| Web Resource Reference | URL                            |
| ---------------------- | ------------------------------ |
| R401: View Shopping Cart | GET /cart |
| R402: Add to Shopping Cart | POST /cart/{product} |
| R403: Remove from Shopping Cart | DELETE /cart/{product} |
| R404: Clear Cart | DELETE /cart |
| R405: Update Cart | PATCH /cart/{product} |
| R406: Checkout Items in Cart | POST /checkout |

<figcaption align= "center">Table: cart's implementation </figcaption>


### 2. Prototype

For this prototype we focused our efforts in developing the main functionalities of the project. We applied some time on the visual aspect but the design might still have some bugs. Apart from this, it might be easy enough to get an idea of the general layout and easily navigate through the website.

The prototype is available at http://lbaw23154.lbaw.fe.up.pt

# Credentials (Verificar):
- user: 
- password:

The code is available at https://git.fe.up.pt/lbaw/lbaw2324/lbaw23154

## Revision History

## GROUP23154, 23/11/2023

* Group member 1 João Brandão Alves, up202108670@fe.up.pt (Editor)
* Group member 2 Eduardo Machado Teixeira de Sousa, up202103342@fe.up.pt 
* Group member 3 Gonçalo Carvalho Marques, up202006874@fe.up.pt
* Group member 4 Carlos Daniel Santos Reis, up201805156@fc.up.pt 
