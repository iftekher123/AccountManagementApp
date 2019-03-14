# AccountManagementApp

Requirement
==============
To design following 2 API on back end server which will return output in JSON format using which front end application will display required information to Users:
1. API to get list of accounts assigned to a particular user.
2. API to get list of transactions against an account 

Technology Used
=================
PHP (Lumen framework) is used for development. Mysql as DB and Apache as web server has been used for testing purpose. However, this can be deployed on MSSQL DB and IIS also.

Server Requirement
=========================
    PHP >= 7.1.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension

	Apache or IIS
	MYSQL or any other DB.
	

Installation Process
=========================

After downloading from Git Repo, extract all the contents and renamed the root folder (lets say as "AccountManagement". 
Put "AccountManagement" Folder to root folder(htdocs) of Apachae. In apache config, change document root as following:
DocumentRoot "server location of htdocs/AccountManagement/public"
<Directory "server location of htdocs/AccountManagement/public">
restart Apache.

in case of IIS, copy "AccountManagement" Folder to root folder(inetpub). Add web site configuratio in IIS pointing to this path.

PHP excutable file should be added to environmental variable.

DB connection detail (Mysql) need to be conigured in "server location of htdocs\AccountManagement\.env" file. it can be configured with other DB also like MSSQL (sqlserv) etc.	

Following 2 tables need to be created on above configured DB:
accounts
transaction_details

Tables can be created by running following command under "server location of htdocs\AccountManagement\" folder

php artisan migrate

OR tables can be created by following SQL execution in given serial for MYSQL DB:

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_date` date NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_available_balance` double(8,2) NOT NULL,
  `assigned_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_account_number_unique` (`account_number`);

ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `value_date` date NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit_amount` double(8,2) NOT NULL,
  `credit_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_narrative` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_account_id_foreign` (`account_id`);

ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;
COMMIT;




Testing Process
===================

1. Need to enter some dummy data in above 2 tables (Accounts and transaction_details).
2. API to get list of accounts assigned to a particular user.
   
   the api url is http://hosturl/api/accounts (GET method). In header, "user_id" parameter need to be passed. 
   Expected Result:
   if user has accounts assigned to him/her, list of accounts will be returned in json format. Otherwise, empty josn packet will be returned.
   
      
3. API to get list of transactions against an account 
	
   the api url is http://hosturl/api/accounts/{id}/link/transactiondetail (GET method).
   Expected Result:
   if that account id has transaction detail, list of transaction detail will be returned in json format. Otherwise, empty josn packet will be returned.
   
