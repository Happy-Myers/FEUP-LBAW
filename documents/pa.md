# PA: Product and Presentation

GameSpace is your gateway to the world of gaming, offering a convenient way to explore and acquire a wide variety of games across genres and game consoles, all in one place. In an era where gamers want something centralized, user-friendly, and personalized gaming experiences, we are here to provide just that.
Never miss out on the bestsellers and your most-wanted titles! Add games to your wishlist for future reference, and when you're sure of your choice, simply add them to your cart. Our user-friendly cart ensures a hassle-free checkout process.

## A9: Product

The GameSpace final product is the culmination of the comprehensive system designed in the preceding stages, using HTML, CSS, and JavaScript to build interactive web pages and is built using the Laravel Framework with PostgreSQL as a database, offering an all-in-one hub for gaming enthusiasts.

GameSpace's primary goal is to provide a seamless journey for game discovery, exploration, and purchase across various genres and consoles. This platform, ideal for all gamers, allows users to maintain a wishlist and features an user-friendly shopping cart for easy checkout. After registration and user profile verification, gamers can start their ultimate gaming experience with GameSpace.

### 1. Installation

The release with the final version of the source code in the group's Git repository is available [ADICIONAR O LINK](), in PA tag.

Full Docker command to launch the image available in the group's GitLab Container Registry using the production database:

```
docker run -it -p 8000:80 --name=lbaw23154 -e DB_DATABASE="23154" -e DB_SCHEMA="lbaw23154" -e DB_USERNAME="lbaw23154" -e DB_PASSWORD="xdcPCrFY" git.fe.up.pt:5050/lbaw/lbaw23154/lbaw23154 

```

### 2. Usage

URL to the product: http://lbaw23154.lbaw.fe.up.pt  

#### 2.1. Administration Credentials

| Email | Password |
| -------- | -------- |
| admin@test.com    | password |

#### 2.2. User Credentials

| Type          | Email  | Password |
| ------------- | --------- | -------- |
| User | test@test.com    | password |


### 3. Application Help

We have implemented the About Us and FAQ pages, links to which are found in the footer, to help the user navigate the site. Contacts are also visible in the footer.

In the FAQ page, we answer some recurring questions about how the website works along with its policies.
IMAGEM FAQ

In the About Us page, we present some general information and trivia about our team, journey and goals.
IMAGEM ABOUT US

### 4. Input Validation

> Describe how input data was validated, and provide examples to scenarios using both client-side and server-side validation.  

### 5. Check Accessibility and Usability

> Provide the results of accessibility and usability tests using the following checklists. Include the results as PDF files in the group's repository. Add individual links to those files here.
>
> Accessibility: https://ux.sapo.pt/checklists/acessibilidade/  
> Usability: https://ux.sapo.pt/checklists/usabilidade/  

### 6. HTML & CSS Validation

> Provide the results of the validation of the HTML and CSS code using the following tools. Include the results as PDF files in the group's repository. Add individual links to those files here.
>   
> HTML: https://validator.w3.org/nu/  
> CSS: https://jigsaw.w3.org/css-validator/  

### 7. Revisions to the Project

> Describe the revisions made to the project since the requirements specification stage.  


### 8. Implementation Details

#### 8.1. Libraries Used

> Include reference to all the libraries and frameworks used in the product.  
> Include library name and reference, description of the use, and link to the example where it's used in the product.  
We used the following libraries in this project:
- 

#### 8.2 User Stories

| US Identifier | Name    | Module | Priority                       | Team Members               | State  |
| ------------- | ------- | ------ | ------------------------------ | -------------------------- | ------ |
| US01 | Product Details |   M02 | High | **João Alves**, Gonçalo Marques | 100%| 
| US02 | Search products |   M02 | High | | 100%| 
| US14 | Sign-in |  M01  | High | | 100%| 
| US15 | Sign-up |   M01 | High | | 100%| 
| US19 | Add to Shopping Cart |   M04 | High | | 100%| 
| US20 | Manage Shopping Cart | M04 | High  | | 100%| 
| US21 | Log out |   M01 | High | | 100%| 
| US22 | View profile |  M01  | High | **Eduardo Sousa**, Gonçalo Marques, João Alves | 100%| 
| US23 | Edit profile |  M01 | High | | 100% |
| US24 | Delete account |  M01 | High | **Eduardo Sousa**, Gonçalo Marques | 100% |
| US42 | Review a game |  M03 | High | | 100% | 
| US43 | Give games a score |   M02 | High | | 100% |
| US44 | Delete a game score |  M02  | High | | 100% |
| US45 | Check purchase history |  M01 | High | | 100% |
| US46 | Delete a game review |  M02 | High | | 100% |
| US03 | Browse Product Categories | M02 | Medium | | 100% |
| US05 | View Reviews | M03 | Medium | | 100% |
| US06 | Home Page | M05 | Medium | | 100% |
| US07 | About Page | M05 | Medium | | 100% |
| US08 | FAQ Page | M05 | Medium | | 100% |
| US09 | Consult Contacts | M05 | Medium | | 100% |
| US16 | Recover Password | M01 | Medium | **Eduardo Sousa**, Gonçalo Marques | 100% |
| US26 | View Wishlist | M03 | Medium |  | 100% |
| US25 | Add to Wishlist | M03 | Medium |  | 100% |
| US27 | Remove from  Wishlist | M03 | Medium |  | 100% |
| US29 | Review Voting | M03 | Medium | **Eduardo Sousa**, Gonçalo Marques | 100% |
| US30 | View Notifications | M01 | Medium |  | 100% |
| US31 | Product Price Change | M01 | Low |  | 100% |
| US33 | Unban Account | M06 | Medium |  | 100% |
| US34 | Manage Catalog | M06 | Medium |  | 100% |
| US35 | Manage Item Category | M06 | Medium |  | 100% |
| US36 | Delete Review | M06 | Medium |  | 100% |
| US37 | Ban Account | M06 | Medium |  | 100% |
| US38 | Manage Stock | M06 | Medium |  | 100% |
| US39 | View Users' Purchase History | M06 | Medium |  | 100% |
| US40 | Manage Order Status | M06 | Medium |  | 100% |
| US41 | Manage Item Description | M06 | Medium |  | 100% |
| US50 | Change in Order Status | M01 | Low |  | 100% |
| US51 | Track Order | M01 | Low |  | 100% |
| US52 | Address Options | M01 | Low | **Eduardo Sousa**, Gonçalo Marques | 100% |

---


## A10: Presentation
 
> This artifact corresponds to the presentation of the product.

### 1. Product presentation

> Brief presentation of the product and its main features (2 paragraphs max).  
>
> URL to the product: http://lbawYYgg.lbaw.fe.up.pt  
>
> Slides used during the presentation should be added, as a PDF file, to the group's repository and linked to here.


### 2. Video presentation

> Screenshot of the video plus the link to the lbawYYgg.mp4 file.

> - Upload the lbawYYgg.mp4 file to Moodle.
> - The video must not exceed 2 minutes.


---


## Revision history

Changes made to the first submission:
1. Item 1
1. ..

***

## GROUP23154, 19/12/2023

* Group member 1 João Brandão Alves, up202108670@fe.up.pt
* Group member 2 Eduardo Machado Teixeira de Sousa, up202103342@fe.up.pt (Editor)
* Group member 3 Gonçalo Carvalho Marques, up202006874@fe.up.pt

