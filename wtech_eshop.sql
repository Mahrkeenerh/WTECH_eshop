PGDMP     -    -                 y         
   wtech_shop    13.2    13.2 D               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    1051153 
   wtech_shop    DATABASE     h   CREATE DATABASE wtech_shop WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Slovak_Slovakia.1250';
    DROP DATABASE wtech_shop;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    3            �            1259    1051263    admins    TABLE     �   CREATE TABLE public.admins (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.admins;
       public         heap    postgres    false    3            �            1259    1051261    admins_id_seq    SEQUENCE     v   CREATE SEQUENCE public.admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.admins_id_seq;
       public          postgres    false    205    3                       0    0    admins_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;
          public          postgres    false    204            �            1259    1051282 
   categories    TABLE     �   CREATE TABLE public.categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    parent bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.categories;
       public         heap    postgres    false    3            �            1259    1051280    categories_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public          postgres    false    209    3            	           0    0    categories_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;
          public          postgres    false    208            �            1259    1051350    filters    TABLE     �   CREATE TABLE public.filters (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    "values" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.filters;
       public         heap    postgres    false    3            �            1259    1051348    filters_id_seq    SEQUENCE     w   CREATE SEQUENCE public.filters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.filters_id_seq;
       public          postgres    false    215    3            
           0    0    filters_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.filters_id_seq OWNED BY public.filters.id;
          public          postgres    false    214            �            1259    1051271    items    TABLE     �  CREATE TABLE public.items (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    category_id bigint NOT NULL,
    new_price double precision NOT NULL,
    old_price double precision NOT NULL,
    description text NOT NULL,
    info_json json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.items;
       public         heap    postgres    false    3            �            1259    1051269    items_id_seq    SEQUENCE     u   CREATE SEQUENCE public.items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.items_id_seq;
       public          postgres    false    207    3                       0    0    items_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.items_id_seq OWNED BY public.items.id;
          public          postgres    false    206            �            1259    1051230 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false    3            �            1259    1051228    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    201    3                       0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    200            �            1259    1051304    order_items    TABLE       CREATE TABLE public.order_items (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    amount integer NOT NULL,
    unit_price double precision NOT NULL,
    item_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.order_items;
       public         heap    postgres    false    3            �            1259    1051302    order_items_id_seq    SEQUENCE     {   CREATE SEQUENCE public.order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.order_items_id_seq;
       public          postgres    false    3    213                       0    0    order_items_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.order_items_id_seq OWNED BY public.order_items.id;
          public          postgres    false    212            �            1259    1051293    orders    TABLE     E  CREATE TABLE public.orders (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    shipping_type character varying(255) NOT NULL,
    shipping_price double precision NOT NULL,
    payment_type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.orders;
       public         heap    postgres    false    3            �            1259    1051291    orders_id_seq    SEQUENCE     v   CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.orders_id_seq;
       public          postgres    false    3    211                       0    0    orders_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;
          public          postgres    false    210            �            1259    1051252    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    password_hash character varying(255),
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    state character varying(255),
    city character varying(255),
    street_and_number character varying(255),
    postal_code character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false    3            �            1259    1051250    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    3    203                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    202            S           2604    1051266 	   admins id    DEFAULT     f   ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);
 8   ALTER TABLE public.admins ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205            U           2604    1051285    categories id    DEFAULT     n   ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    209    209            X           2604    1051353 
   filters id    DEFAULT     h   ALTER TABLE ONLY public.filters ALTER COLUMN id SET DEFAULT nextval('public.filters_id_seq'::regclass);
 9   ALTER TABLE public.filters ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            T           2604    1051274    items id    DEFAULT     d   ALTER TABLE ONLY public.items ALTER COLUMN id SET DEFAULT nextval('public.items_id_seq'::regclass);
 7   ALTER TABLE public.items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    207    207            Q           2604    1051233    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    200    201            W           2604    1051307    order_items id    DEFAULT     p   ALTER TABLE ONLY public.order_items ALTER COLUMN id SET DEFAULT nextval('public.order_items_id_seq'::regclass);
 =   ALTER TABLE public.order_items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            V           2604    1051296 	   orders id    DEFAULT     f   ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            R           2604    1051255    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    203    203            �          0    1051263    admins 
   TABLE DATA           E   COPY public.admins (id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    205   N       �          0    1051282 
   categories 
   TABLE DATA           N   COPY public.categories (id, name, parent, created_at, updated_at) FROM stdin;
    public          postgres    false    209   ?N                  0    1051350    filters 
   TABLE DATA           M   COPY public.filters (id, name, "values", created_at, updated_at) FROM stdin;
    public          postgres    false    215   .P       �          0    1051271    items 
   TABLE DATA           �   COPY public.items (id, name, category_id, new_price, old_price, description, info_json, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    207   �P       �          0    1051230 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    201   ]       �          0    1051304    order_items 
   TABLE DATA           h   COPY public.order_items (id, order_id, amount, unit_price, item_id, created_at, updated_at) FROM stdin;
    public          postgres    false    213   �]       �          0    1051293    orders 
   TABLE DATA           r   COPY public.orders (id, user_id, shipping_type, shipping_price, payment_type, created_at, updated_at) FROM stdin;
    public          postgres    false    211   �]       �          0    1051252    users 
   TABLE DATA           �   COPY public.users (id, email, password_hash, first_name, last_name, state, city, street_and_number, postal_code, created_at, updated_at) FROM stdin;
    public          postgres    false    203   ^                  0    0    admins_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.admins_id_seq', 1, false);
          public          postgres    false    204                       0    0    categories_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.categories_id_seq', 1, true);
          public          postgres    false    208                       0    0    filters_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.filters_id_seq', 1, false);
          public          postgres    false    214                       0    0    items_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.items_id_seq', 2, true);
          public          postgres    false    206                       0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 7, true);
          public          postgres    false    200                       0    0    order_items_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.order_items_id_seq', 9, true);
          public          postgres    false    212                       0    0    orders_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.orders_id_seq', 9, true);
          public          postgres    false    210                       0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 15, true);
          public          postgres    false    202            ^           2606    1051268    admins admins_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_pkey;
       public            postgres    false    205            b           2606    1051290    categories categories_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public            postgres    false    209            h           2606    1051358    filters filters_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.filters
    ADD CONSTRAINT filters_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.filters DROP CONSTRAINT filters_pkey;
       public            postgres    false    215            `           2606    1051279    items items_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.items DROP CONSTRAINT items_pkey;
       public            postgres    false    207            Z           2606    1051235    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    201            f           2606    1051309    order_items order_items_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_pkey;
       public            postgres    false    213            d           2606    1051301    orders orders_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_pkey;
       public            postgres    false    211            \           2606    1051260    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    203            i           2606    1051310    admins admins_user_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 G   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_user_id_foreign;
       public          postgres    false    203    205    2908            k           2606    1051320 $   categories categories_parent_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_parent_foreign FOREIGN KEY (parent) REFERENCES public.categories(id);
 N   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_parent_foreign;
       public          postgres    false    209    209    2914            j           2606    1051315    items items_category_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id);
 I   ALTER TABLE ONLY public.items DROP CONSTRAINT items_category_id_foreign;
       public          postgres    false    2914    209    207            n           2606    1051335 '   order_items order_items_item_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_item_id_foreign FOREIGN KEY (item_id) REFERENCES public.items(id);
 Q   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_item_id_foreign;
       public          postgres    false    213    207    2912            m           2606    1051330 (   order_items order_items_order_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.orders(id);
 R   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_order_id_foreign;
       public          postgres    false    213    2916    211            l           2606    1051325    orders orders_user_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 G   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_user_id_foreign;
       public          postgres    false    203    2908    211            �   (   x�3�44�4202�54�50V04�24�21�&����� ���      �   �  x����n�0@��W�[S�G�,h�K7`-�K/��$Bl+�d`�?EK4f���gRI�M�ũ�1������BJA�!2��J�i� ��]?��]��G����%�f���K+a=E׺0tѶ�|�mۅ༽�G|��19t�,���R�*��ƽ�KqQ������3�6�p/��`C�n�,�6��R�~��!�pv�4zv�3C"ؤ�G�.2fe��cH�S�Gq�=+�CR����L���p*���2�7�:�qtrJxr�y�R��MYrS7|x
^_�b�ʙaz��v܆�����t1�VC��5��d���8��q��[��e(����\_����0C��{䖨�˔���Vse��0t�ۄ9���)�2?M�e�%3�5��k��; 3��\��'��U�Y��׭��)����++����`}����f�*3Ti��&�vJ����A���QN�<�m����ȴ*J���WD��y�          �   x���1�0E��\�
�R�0s�.,�09��/�܁�oxO�4��6�W�BC!f���F� .���y��ʜ���v��V��H�2����_��V�Ȱ3��H"�m�3�����z>z����D�=A�#�����
��G���%�N���/�N�      �   )  x���ے�6�����*���<K�͖g�T\��)�$���EAc���౒����Ŷ�9#��-�5�0v��>6ݍ�x⪈����D�Jض�<�۞X�t!��Ө��zM��*UNğ��n[>�s��R���u�}��|�T,.��* ��ME�,�T��O8�c?��g�+gnO�~8({��'�/~��I�d����r��k��������s���$޿�[U:�����*TT�<��$�:;����؁�����%��MT��7u���
��oq���U&n�GEy�����K4�Xs��u*~�X*�rAz�+`IZ�lK����$5.�(~�c�ҴΒ<�����뚀�0��s�]�ۃ	������e��,�:��Z��i���^��n�W�r���,����0h����׫��*�Ж��k*׵�D3$�#�U��V�6��=_�2�jv�3l�Gf�k���-�'�,���*�oAo�p��$�?3��2��b�mU��G�r���$��9�B-Oc��5�ۗ�����v�UC N�5H���/�^�<�y�vXOo��S]�\��-~#��"����o��'Ƞ7)�|v�w*M���T�5��AQy�TSx=>Q'&�2"��\&r&����#�<(#�����C�7=s}���^��v��J4~7(�2"���LhMBӍ������!1��f
�z�q�1�0��ݖ[]T���C�=����� WT,�|��la��E#W&�[GiR�dV#)Lrĭ9+��(zg�w&��匲FU�����6��*��z���յF�mF޶x�e-~��N�F�azQ�9)c=�Ӡ@�xU�U��e�rWV*c�6��O�z�L�K�l�ɻ�]~�֪�Hib��*�(����"Z�h(�<�u�L��g����=��`��X����)^f� ��ddQ�I��:��\�剫��Ȕ���2 ��e��..�,I�rZ��a�m���.x�ar�VՁ�S8_�hI�F���Q��#�i8��?_���[��#[++,7��'C{]$�d�\��Z��R:$W�ΤS�#9������tʙ[4y�k#�/^���P���L��**(�F,����T���T����泳�зy���d�����ǒ�{!�s��s���]���@:��5PY����B9�񜽅���s&�D�*h�y�A��9���-n|��UE�dM�7��Í�8���ɠ�*���~��:��ǡ��n�eX�X��J^�%r��qSG	9J̱�Z��bj��\ԕ$D��ϩ���_�Ə���]`Cf
P_�ۖ���샦=
� g��F����&�֒/@1�v�LV*��D��=���~����銫���i�R'ӌ�~Y!��^�>N	�\W��j_\�zݗQŔ����_k껋&��wdQ^������Y<�إ����8��"A-���u�u�T��E�40d�c��
�Wj�ܔ|т� �tǑr���\�AY�_�i��;W:�M�/�/ɟ�܎�(��
�Ug#UxH,�t��ӈD���?pA3p�U8@S0	�="�t���2���a�����mq���o
t���R�rh�>��o�<wr���h|\u���� ����k�s�Dkb���f�l���e r��.Ad����"�ɀC
������ا���ΑL-L�)���ɿc��}�p,՘q�~�62@����5��z�h����7�TxmR�Mﴥ߫/#���K^F���-�፝�0\��s��T᠂�u=���-�1����T�9�Co zm<�����#w��bl�\��S#��%���g�O��3�,��٠p�.�jZ�F�v�M7v��%��ܬ�9�l>#��L�Q:ݺ�l��4o��0C2���y���7{Ky��R�� ��q?p�Y�K��Z���~ �o�Ujd`�Qt�T�.Zؔ^;�7��a1�:K�|�����ݟ*F@Z��|�/-n�d�$ ;�T�)]�)�e����䙁� ���U�H^�A�F}G��k������@:otU�K�+���>������,������"ˀ�!n�J�8��:��ݺO�����Ȱ�i�_��.E)��hH-ʦ^���F��bMQ�(�W�K��&)iA_�6Q�)���U�Xy$���?�<�ܲ�D`�l+�	�&ɢX���6�x��}�m&�lh�2�9�'}��TGw:���#|Gk=��uRq�W�"J�~%�,��E�����M8p)L�*��غ%bz���Z��J��8e�GEGl!b�8$�'�Cq��H��YVf7h�mX�¾\����*w�!��B���7�'����t]��/��W�c�ug}R0t+�p�x�䕾�>^�?�i�w
��g]Z�\�ve��(S`2
�~�-��,���x��y���C�n�7����[X�y��GIq�����x�(�]%)}�BWx�$��Fo�vHqK�^���"v
�AN��&�1����u�8b�f��bdR��w����hu����ܠ��ޠ���YB�Q+%�ި�?Pl�X#���̓�vrlu��(�qe v��$5c��'\2�5�9����59���x�n	a�$WZ�]�����A.�:���72<��j
�m��_R@�u�;����eIx�� �%:N��������L�2��'	���шS���2 ��,�������u��M��d�n%���l�O�(i&w_��W�62��q��&Q�R��:Y�P��8��0�0���mb��V4�"��h�h�n�'��/��(W��*���B�c�ҽ��3�r��b~X��U����9�6礅�F�����0���Z�w�m��90\$��X�x���Sx�Ï�O���&:v��<ʳL�9o`���n��ʰ�ΰ�G�|�wJ���5���v�i���(���ސ�K^+�^R4�t���n?��)�e`v�9��3�gd��tegm.�!���!՞ɮ���uy�G�1�����9��L(�0��L���� ��0���x��l=3v	��	��w8R��ރK|Q�P�N_�|�ج�O\���ǻɓ'O��,�J      �   �   x�U�a
�0����&�s�Extk��fGW=�qL�H �K^Ȱ�#�A���H��Yʒ�qD�{Y�|���؍bȲ*�@��'&n>�����͵���yۣD�'Bp�L�)�xQ�^������KZsZM��ö�!��{�)�<�U�0�6��/����C�	K>W$��	���־ �LQs      �      x������ � �      �      x������ � �      �   �   x�34��M,)-vH�M���K���T1�T14P�IO���
�H���H4�tK�ԋ����s6I.��Яʉ�)1��p)O��)�O����X����@FF���F��
��VVF��ĸb���� ��)<     