# ER: Requirements Specification Component

TODO

## A1: GameSpace

GameSpace is your gateway to the world of gaming, offering a convenient way to explore and acquire a wide variety of games across genres and game consoles, all in one place. In an era where gamers want something centralized, user-friendly, and personalized gaming experiences, we are here to provide just that.

Our platform offers a navigation system, allowing you to easily browse and discover games categorized by genre and platform, or simply filter them using the filter tool. Whether you are in a hurry for a specific title or just exploring new games, our search bar and filter tool will ensure that you find what you are looking for.

Each game has its dedicated page, providing you with essential information and some valuable user reviews of your new wished game. Gain insights from other gamers and make informed decisions before adding games to your library.

We believe in making your gaming experience unique. Our recommendation engine analyzes your gaming preferences and past purchases to suggest some new titles that you might like.

Never miss out on the bestsellers and your most-wanted titles! Add games to your wish list for future reference, and when you're sure of your choice, simply add them to your cart. Our user-friendly cart ensures a hassle-free checkout process.

## A2: Actors and User stories

This artefact contains the actors and their user stories of this system, with the purpose of showing the functionalities and requeriments that our application will have.


### 1. Actors

![](https://i.imgur.com/YryzX5e.jpg)

<figcaption align= "center">Figure 1: Actors</figcaption></p>


| Identifier | Description | 
| --- | --- |
| User | Generic user that has access to public information such as search and view items. |
| Visitor | Unauthenticated user that can register itself or sign-in the system. |
| Authenticated User | User that can make purchases, manage their personal information, log out of the account, add items to favorites. |
| Buyer | User that has made purchases. Can check their purchase history, track their order, review an item that they have bought. |
| Administrator | Authenticated user that is responsible for the management of products and users and supervisory and moderation functions, like delete offensive reviews. |
| API | External OAuth APIs that can be used to register or authenticate into the system. |

<figcaption align= "center">Table 1: Actor's description</figcaption>


### 2. User Stories

#### 2.1. User

| Identifier | Name | Priority | Priority |
| --- | --- | --- | --- |
| US01 | Manage User Account | High | As an User, I want to be able to edit my account, so that I can update my information. |
| US02 | Product Details | High | As an User, I want to see the product details, so that I can see a detailed representation of it. |
| US03 | Add to Shopping Cart | High | As an User, I want to add products to the shopping cart, so that I can buy them later. |
| US04 | Manage Shopping Cart | High | As an User, I want to manage my shopping cart, so that I can decide what I want to buy. |
| US05 | Search products | High | As an User, I want to search for products, so that I can find what I'm looking for. |
| US06 | Browse Product Categories | Medium | As a User, I want to view products from a selected category, so that I can explore all the products available from that category. |
| US07 | Search by Filters | Medium | As a User, I want to be able to filter with some specific properties, so that I can narrow my search. |
| US08 | View Reviews | Medium | As an User, I want to view products reviews, so that I can make an opinion about it. |
| US09 | Home Page | Medium | As an User, I want to have access to the home page, so that I can have a brief presentation of the website. |
| US10 | About Page | Medium | As an User, I want to see an About page, so that I can see a description of the website and its creators. |
| US11 | FAQ Page | Medium | As an User, I want to see a FAQ page, so that I can get quick answers to commom questions. |
| US12 | Consult Contacts | Medium | As a User, I want to be able to access contacts, so that I can come in touch with the platform creators. |
| US13 | See User Account | Medium | As an User, I want to be able to search and view users' account, so that I can see other users reviews and information. |
| US14 | Sorting options | Low | As a User, I want to be able to sort with some specific properties, so that I can easily see shop items. |
| US15 | View Recommendations | Low | As an User, I want to view recommended products, so that I can view products suitable for me. |


<figcaption align= "center">Table 2: User's user stories</figcaption>

#### 2.2. Visitor

| Identifier | Name | Priority | Description |
| --- | --- | --- | --- |
| US16 | Sign-in | High | As a Visitor, I want to authenticate into the system, so that I can access privileged information. |
| US17 | Sign-up | High | As a Visitor, I want to register myself into the system, so that I can authenticate myself into the system. |
| US18 | External API Sign-in | Low | As a Visitor, I want to register a new account linked to my Google account, so that I can avoid to create a whole new account to use the platform.  |
| US19 | External API Sign-up | Low | As a Vistor, I want to sign-in through my Google account, so that I can authenticate myself into the system. |


<figcaption align= "center">Table 3: Visitor's user stories</figcaption>

#### 2.3. Authenticated User

| Identifier | Name | Priority | Description |
| --- | --- | --- | --- |
| US20 | Log in and out | High | As an Authenticated User, I want to log in and out of my account, so that I can use my account and close it when I’m away |
| US21 | View profile | High | As an Authenticated User, I want to view my profile, so that I can see my personal data |
| US22 | Edit profile | High | As an Authenticated User, I want to edit my profile, so I can alter my personal data |
| US23 | Delete account | High | As an Authenticated User, I want to delete my account, so that I can remove my personal data from the site when I don’t want to use it anymore |
| US24 | Add to cart/wishlist | Medium | As an Authenticated User, I want to add products to my cart/wishlist, so that I can keep track of products I’d like to buy |
| US25 | View cart/wishlist | Medium | As an Authenticated User, I want to view my cart/wishlist, so that I can see what products I have previously saved there |
| US26 | Remove from cart/wishlist | Medium | As an Authenticated User, I want to remove products from my cart/wishlist, so that I can stop keeping track of products I’m not interested in anymore |
| US27 | Recover password | Medium | As an Authenticated User, I want to recover my password, so that I’m not locked out of my account if I forget it |
| US28 | View Notifications | Low | As an Authenticated User, I want to view my notifications, so that I’m kept up to date about changes that might concern me. |
| US29 | Product price change | Low | As an Authenticated User, I want to receive a notification if a product in my shopping cart or wish list changes price, so that I’m aware that the price of the product was altered |
| US30 | Product availability | Low | As an Authenticated User, I want to receive a notification when a product in my cart or wish list is available again, so that I can I order that product |

<figcaption align= "center">Table 4: Authenticated User's user stories</figcaption>

#### 2.4. Administrator

| Identifier | Name | Priority | Description |
| --- | --- | --- | --- |
| US31 | Unban Account | Medium | As an Admin, I want to be able to unban a user that was previously banned, so that I can provide a second chance to a previously misbehaving user. |
| US32 | Manage Catalog | Medium | As an Admin, I want to be able to add, edit and remove items from the shop's catalog, so that users get an updated list of the item's being sold. |
| US33 | Manage Item Category | Medium | As an Admin, I want to be able to manage the category of an item, so that users may more easily find what they are looking for. | 
| US34 | Delete Review | Medium | As an Admin, I want to be able to delete an item review, so that the platform is free from misinformation and inappropriateness. | 
| US35 | Ban Account | Medium | As an Admin, I want to be able to ban a user's account (temporarily or permanently), so that i can punish misbehaving users. |
| US36 | Manage Stock | Medium | As an Admin, I want to be able manage the shop's stock, so that users are aware when an item is sold off. |
| US37 | View Users’ Purchase History | Medium | As an Admin, I want to be able to view the users’ purchase history, so that I can check what the users are buying. |
| US38 | Manage Order Status | Medium | As an Admin, I want to be able to manage the status of orders, so that I can monitor the sale.|
| US39 | Manage Item Description | Medium | As an Admin, I want to be able manage the descriptions of items, so that users get an accurate representation of what is being sold. |

<figcaption align= "center">Table 5: Administrator's user stories</figcaption>


#### 2.5. Buyer

| Identifier | Name | Priority | Description |
| --- | --- | --- | --- |
| US40 | Review a game | High | As a Buyer, I want to write a review of a game that I have bought, so that other users can see what I thought of the game. |
| US41 | Give games a score | High | As a Buyer, I want to be able rate a game from 1 to 5, so that other users have an idea of the quality of the game. |
| US424 | Delete a game score | High | As a Buyer, I want to be able to delete the score I’ve given to a game, so that other users don’t see it. |
| US43 | Check shop history | High | As a Buyer, I want to view my shop history, so that I can check my past purchases. |
| US44 | Delete a game review | High | As a Buyer, I want to be able to delete a previous review I wrote about a game, so that other users can't read it. |
| US45 | Edit a game review | Medium | As a Buyer, I want to be able to edit a review on a game that I bought, so that I can alter it in case I change my mind on the game. |
| US46 | Payment approval | Medium | As a Buyer, I want to receive a notification when a payment gets approved, so that I know that my payment process was successful. |
| US47 | Cancel order | Low | As a Buyer, I want to be able to cancel an order, so that I can get my money back if I accidentally bought an item I don’t want and it hasn’t been delivered yet. |
| US48 | Change in order status | Low | As a Buyer, I want to receive a notification about changes in the order processing stage, so that I know what my order status is. |
| US49 | Track order | Low | As a Buyer, I want to be able to track an order, so that I know the status of a purchased product. | 

<figcaption align= "center">Table 6: Buyer's user stories</figcaption>

### 3. Supplementary Requirements

#### 3.1. Business rules 

| Identifier | Name | Description | 
| --- | --- | --- | 
| BR01 | Deleted item history | The description and statistics of an item (name, description, reviews, score, etc) must be maintained even if it was deleted from the store in order to keep the sales record. | 
| BR02 | Review Date | The review date of an item must be greater than the purchase date of the item by the user. |
| BR03 | Item score | All shop items have a score, a mean of all its user scores. | 
| BR04 | Deleted user history | An archive of a user's purchase history is maintained even if the user has deleted their account, in order to preserve data consistency outside the user themselves. | 
| BR05 | Order cancellation restriction | A non game order can only be canceled before it has been delivered. After being delivered, it is only possible to request a refund. | 
| BR06 | Game refunds | A game can be refunded at any time, independent from the date that it was bought and how many hours the user played the game, but the user will only receive 50% from the value that paid for that game. | 
| BR07 | Difference between user and admin accounts | Admin's accounts are independent of the users accounts, so admins cannot buy products. | 
| BR08 | Single review and score | An authenticated user can only make one review and one score per item acquired. |

<figcaption align= "center">Table 7: Business rules </figcaption>

#### 3.2. Technical requirements

| Identifier | Name | Description |
| --- | --- | --- |
| TR01 | Availability | The system must be available 99 percent of the time in each 24-hour period. |
| TR02 | Accessibility | The system must ensure that everyone can access and use the website, regardless of handicaps or browser of choice. |
| TR03 | Usability | The system should be simple and easy to use. The platform is meant for users of all ages and levels of technical knowledge, so ease of use is very important. |
| TR04 | Performance | The system should have response times shorter than 2 s to ensure the user's attention. The system should be accessible without the need to install other software, adopting standard web technologies. |
| TR05 | Web application | The system should be implemented as a web application with dynamic pages (HTML5, JavaScript, CSS3 and PHP). The system should be platform independent to allow for a wider user base. |
| TR06 | Portability | The server-side system should work across multiple platforms (Linux, Mac OS, etc). |
| TR07 | Database | The PostgreSQL database management system must be used. |
| TR08 | Security | The system shall protect information from unauthorized access through the use of an authentication and verification system. |
| TR09 | Robustness | The system must be prepared to handle and continue operating when runtime errors occur. |
| TR10 | Scalability | The system must be prepared to deal with the growth in the number of users and their actions. |
| TR11 | Ethics | The system must respect the ethical principles in software development (for example, personal user details, or usage data, should not be collected nor shared without full acknowledgement and authorization from its owner). |

<figcaption align= "center">Table 8: Technical requirements</figcaption>

#### 3.3. Restrictions

| Identifier | Name | Description |
| --- | --- | --- |
| C01 | Deadline | The system should be ready to be used at the end of the semester. |

<figcaption align= "center">Table 9: Restrictions</figcaption>

## A3: Information Architecture
