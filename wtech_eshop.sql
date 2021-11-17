CREATE TABLE "users" (
  "id" bigint PRIMARY KEY NOT NULL,
  "email" varchar(64) NOT NULL,
  "password_hash" varchar(256) DEFAULT null,
  "first_name" varchar(64) NOT NULL,
  "last_name" varchar(64) NOT NULL,
  "state" varchar(64) DEFAULT null,
  "city" varchar(64) DEFAULT null,
  "street_and_number" varchar(256) DEFAULT null,
  "postal_code" varchar(64) DEFAULT null
);

CREATE TABLE "admins" (
  "id" bigint PRIMARY KEY NOT NULL,
  "user_id" bigint NOT NULL
);

CREATE TABLE "items" (
  "id" bigint PRIMARY KEY NOT NULL,
  "name" varchar(256) NOT NULL,
  "category_id" bigint NOT NULL,
  "image_100" bytea NOT NULL,
  "image_200" bytea NOT NULL,
  "image_500" bytea NOT NULL,
  "price" float8 NOT NULL,
  "sale" integer NOT NULL,
  "description" varchar(8192) NOT NULL,
  "info_json" varchar(8192) NOT NULL
);

CREATE TABLE "categories" (
  "id" bigint PRIMARY KEY NOT NULL,
  "name" varchar(64) NOT NULL,
  "parent" bigint DEFAULT null,
  "image" bytea NOT NULL,
  "filter_json" varchar(8192) NOT NULL
);

CREATE TABLE "orders" (
  "id" bigint PRIMARY KEY NOT NULL,
  "user_id" bigint NOT NULL,
  "shipping_type" varchar(64) NOT NULL,
  "shipping_price" float8 NOT NULL,
  "payment_type" varchar(64) NOT NULL
);

CREATE TABLE "order_Items" (
  "id" bigint PRIMARY KEY NOT NULL,
  "order_id" bigint NOT NULL,
  "amount" integer NOT NULL,
  "unit_price" float8 NOT NULL,
  "item_id" bigint NOT NULL
);

ALTER TABLE "admins" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "items" ADD FOREIGN KEY ("category_id") REFERENCES "categories" ("id");

ALTER TABLE "categories" ADD FOREIGN KEY ("parent") REFERENCES "categories" ("id");

ALTER TABLE "orders" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "order_Items" ADD FOREIGN KEY ("order_id") REFERENCES "orders" ("id");

ALTER TABLE "order_Items" ADD FOREIGN KEY ("item_id") REFERENCES "items" ("id");
