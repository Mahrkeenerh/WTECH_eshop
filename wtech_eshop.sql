PGDMP     '                    y         
   wtech_shop    13.2    13.2 L               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    1051153 
   wtech_shop    DATABASE     h   CREATE DATABASE wtech_shop WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Slovak_Slovakia.1250';
    DROP DATABASE wtech_shop;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    3            ?            1259    1051263    admins    TABLE     ?   CREATE TABLE public.admins (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.admins;
       public         heap    postgres    false    3            ?            1259    1051261    admins_id_seq    SEQUENCE     v   CREATE SEQUENCE public.admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.admins_id_seq;
       public          postgres    false    3    205                       0    0    admins_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;
          public          postgres    false    204            ?            1259    1051361    carts    TABLE     ?   CREATE TABLE public.carts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    contents_json json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.carts;
       public         heap    postgres    false    3            ?            1259    1051359    carts_id_seq    SEQUENCE     u   CREATE SEQUENCE public.carts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.carts_id_seq;
       public          postgres    false    217    3                       0    0    carts_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.carts_id_seq OWNED BY public.carts.id;
          public          postgres    false    216            ?            1259    1051282 
   categories    TABLE     ?   CREATE TABLE public.categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    parent bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.categories;
       public         heap    postgres    false    3            ?            1259    1051280    categories_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public          postgres    false    209    3                       0    0    categories_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;
          public          postgres    false    208            ?            1259    1051350    filters    TABLE     ?   CREATE TABLE public.filters (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    "values" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.filters;
       public         heap    postgres    false    3            ?            1259    1051348    filters_id_seq    SEQUENCE     w   CREATE SEQUENCE public.filters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.filters_id_seq;
       public          postgres    false    215    3                       0    0    filters_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.filters_id_seq OWNED BY public.filters.id;
          public          postgres    false    214            ?            1259    1051271    items    TABLE     ?  CREATE TABLE public.items (
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
       public         heap    postgres    false    3            ?            1259    1051269    items_id_seq    SEQUENCE     u   CREATE SEQUENCE public.items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.items_id_seq;
       public          postgres    false    3    207                       0    0    items_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.items_id_seq OWNED BY public.items.id;
          public          postgres    false    206            ?            1259    1051230 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false    3            ?            1259    1051228    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    201    3                       0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    200            ?            1259    1051304    order_items    TABLE       CREATE TABLE public.order_items (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    amount integer NOT NULL,
    unit_price double precision NOT NULL,
    item_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.order_items;
       public         heap    postgres    false    3            ?            1259    1051302    order_items_id_seq    SEQUENCE     {   CREATE SEQUENCE public.order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.order_items_id_seq;
       public          postgres    false    213    3                       0    0    order_items_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.order_items_id_seq OWNED BY public.order_items.id;
          public          postgres    false    212            ?            1259    1051293    orders    TABLE     E  CREATE TABLE public.orders (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    shipping_type character varying(255) NOT NULL,
    shipping_price double precision NOT NULL,
    payment_type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.orders;
       public         heap    postgres    false    3            ?            1259    1051291    orders_id_seq    SEQUENCE     v   CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.orders_id_seq;
       public          postgres    false    211    3                       0    0    orders_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;
          public          postgres    false    210            ?            1259    1051252    users    TABLE     ?  CREATE TABLE public.users (
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
       public         heap    postgres    false    3            ?            1259    1051250    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    203    3                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    202            Z           2604    1051266 	   admins id    DEFAULT     f   ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);
 8   ALTER TABLE public.admins ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205            `           2604    1051364    carts id    DEFAULT     d   ALTER TABLE ONLY public.carts ALTER COLUMN id SET DEFAULT nextval('public.carts_id_seq'::regclass);
 7   ALTER TABLE public.carts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            \           2604    1051285    categories id    DEFAULT     n   ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    208    209            _           2604    1051353 
   filters id    DEFAULT     h   ALTER TABLE ONLY public.filters ALTER COLUMN id SET DEFAULT nextval('public.filters_id_seq'::regclass);
 9   ALTER TABLE public.filters ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            [           2604    1051274    items id    DEFAULT     d   ALTER TABLE ONLY public.items ALTER COLUMN id SET DEFAULT nextval('public.items_id_seq'::regclass);
 7   ALTER TABLE public.items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    207    207            X           2604    1051233    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    200    201            ^           2604    1051307    order_items id    DEFAULT     p   ALTER TABLE ONLY public.order_items ALTER COLUMN id SET DEFAULT nextval('public.order_items_id_seq'::regclass);
 =   ALTER TABLE public.order_items ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            ]           2604    1051296 	   orders id    DEFAULT     f   ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            Y           2604    1051255    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    203    203                      0    1051263    admins 
   TABLE DATA           E   COPY public.admins (id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    205   ?V                 0    1051361    carts 
   TABLE DATA           S   COPY public.carts (id, user_id, contents_json, created_at, updated_at) FROM stdin;
    public          postgres    false    217   9W                 0    1051282 
   categories 
   TABLE DATA           N   COPY public.categories (id, name, parent, created_at, updated_at) FROM stdin;
    public          postgres    false    209   ?W                 0    1051350    filters 
   TABLE DATA           M   COPY public.filters (id, name, "values", created_at, updated_at) FROM stdin;
    public          postgres    false    215   ?Y                 0    1051271    items 
   TABLE DATA           ?   COPY public.items (id, name, category_id, new_price, old_price, description, info_json, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    207   DZ       ?          0    1051230 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    201   ?f       	          0    1051304    order_items 
   TABLE DATA           h   COPY public.order_items (id, order_id, amount, unit_price, item_id, created_at, updated_at) FROM stdin;
    public          postgres    false    213   ?g                 0    1051293    orders 
   TABLE DATA           r   COPY public.orders (id, user_id, shipping_type, shipping_price, payment_type, created_at, updated_at) FROM stdin;
    public          postgres    false    211   ?h       ?          0    1051252    users 
   TABLE DATA           ?   COPY public.users (id, email, password_hash, first_name, last_name, state, city, street_and_number, postal_code, created_at, updated_at) FROM stdin;
    public          postgres    false    203   i                  0    0    admins_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.admins_id_seq', 1, false);
          public          postgres    false    204                       0    0    carts_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.carts_id_seq', 1, false);
          public          postgres    false    216                        0    0    categories_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.categories_id_seq', 1, true);
          public          postgres    false    208            !           0    0    filters_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.filters_id_seq', 1, false);
          public          postgres    false    214            "           0    0    items_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.items_id_seq', 2, true);
          public          postgres    false    206            #           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 8, true);
          public          postgres    false    200            $           0    0    order_items_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.order_items_id_seq', 26, true);
          public          postgres    false    212            %           0    0    orders_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.orders_id_seq', 18, true);
          public          postgres    false    210            &           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 19, true);
          public          postgres    false    202            f           2606    1051268    admins admins_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_pkey;
       public            postgres    false    205            r           2606    1051369    carts carts_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_pkey;
       public            postgres    false    217            j           2606    1051290    categories categories_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public            postgres    false    209            p           2606    1051358    filters filters_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.filters
    ADD CONSTRAINT filters_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.filters DROP CONSTRAINT filters_pkey;
       public            postgres    false    215            h           2606    1051279    items items_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.items DROP CONSTRAINT items_pkey;
       public            postgres    false    207            b           2606    1051235    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    201            n           2606    1051309    order_items order_items_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_pkey;
       public            postgres    false    213            l           2606    1051301    orders orders_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_pkey;
       public            postgres    false    211            d           2606    1051260    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    203            s           2606    1051310    admins admins_user_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 G   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_user_id_foreign;
       public          postgres    false    205    2916    203            y           2606    1051370    carts carts_user_id_foreign    FK CONSTRAINT     z   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 E   ALTER TABLE ONLY public.carts DROP CONSTRAINT carts_user_id_foreign;
       public          postgres    false    203    217    2916            u           2606    1051320 $   categories categories_parent_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_parent_foreign FOREIGN KEY (parent) REFERENCES public.categories(id);
 N   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_parent_foreign;
       public          postgres    false    2922    209    209            t           2606    1051315    items items_category_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id);
 I   ALTER TABLE ONLY public.items DROP CONSTRAINT items_category_id_foreign;
       public          postgres    false    2922    209    207            x           2606    1051335 '   order_items order_items_item_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_item_id_foreign FOREIGN KEY (item_id) REFERENCES public.items(id);
 Q   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_item_id_foreign;
       public          postgres    false    213    207    2920            w           2606    1051330 (   order_items order_items_order_id_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.order_items
    ADD CONSTRAINT order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.orders(id);
 R   ALTER TABLE ONLY public.order_items DROP CONSTRAINT order_items_order_id_foreign;
       public          postgres    false    2924    213    211            v           2606    1051325    orders orders_user_id_foreign    FK CONSTRAINT     |   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 G   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_user_id_foreign;
       public          postgres    false    2916    211    203               :   x?3?44?4202?54?50V04?24?21?&?e?ih??0U ??ZZ?X`?????? ,B?         [   x?m???0??]E ????N???????7?_,
:??h?e?1+#????b??63??6??˞]???!??ޝ??鱪???%         ?  x????n?0@??W??[S?G?,h?K7`-?K/??$Bl+?d`??EK4f???gRI?M?ũ?1??????BJA?!2??J?i? ??]???]??G????%??f???K+a=E׺0tѶ?|?mۅ༽?G|??19t?,???R?*??ƽ?KqQ??????3?6?p/??`C?n?,?6??R?~??!?pv?4zv?3C"ؤ?G?.2fe??cH?S?Gq??=+?CR????L???p*???2?7?:?qtrJxr?y?R??MYrS7|x
^_?b?ʙaz??v܆?????t1?VC??5??d???8??q??[??e(????\_????0C??{䖨?˔???Vse??0t?ۄ9???)?2?M?e?%3?5??k??; 3??\??'??U?Y??׭??)????++????`}????f?*3Ti??&?vJ????A???QN?<?m????ȴ*J???WD??y?         ?   x???1?0E??\?
?R??0s?.,?09??/?܁?oxO?4??6?W?BC!f???F? .???y???ʜ???v??V??H??2????_??V?Ȱ3??H"?m?3?????z>z????D?=A?#?????
??G???%?N???/?N?         w  x???_??6???O??S?m|%ʒ^?m?M.Ev?????2m??D??d??????nf(?mINlg??&#{??hf83?
?ݔI??W?dQ3?e??????)y??M??<Y.??I??	???????Oy̟^????)?O??OS???ĕ?>?e9|??IF?\????1???+?9"v???Fe???DH?C?ԅ??:)??u?,??߿f?`r"i\'?Nw߀?kU?&??>??)UR?????_?Z??n0*C?????_ه?????*i????R?o??1W:4~Aw???O?IY??>???'?bT??S??ǺT??3?#?<????Ԣ?z]??4G?q?%??[?eM???#????!`? ???z??	?Q?tH2@$????1?)???if?zxքk
>3??Wz~?u?-?QB??z?T??qh|M?zN4c2??Ve?tZu??P͓?f'?q?q?<?9?;??`.{?K^5?{Ur???"?M?I?B?A2?w?&_???@??˕??6B??hK5??Ս]'?G?+??ر???weʂ???&M????  ??
ܨ,3??R?N???2???T??|]????t2 ?["???D???T>D?QP[*?<8????Maj)??ۓO???????tK(?ЙDv:Yo?kl?f
о?d?n?b
?u???Ӎ???6?UkS?m?C??`vN?uc??[? ?q%??? ??u	??e.?1?????I2]ox?`¥\J?WH??J?'+??N^?!#S?qI??-????u:Գtc?o??k?<??7?B??d??.?)?l???t??>?u??Nt7?R?#??S?!???2D??+@??ZB???u?!?M2??H??a?????܍?)?̪{?q?p?#bT??Ҭ?%{	V???0m?????&)!?????Q???2??g?v???4?? ??E#?r?~["h?|????????ο:iз?N??S???ETR?#i?
?*?T?????9Hխ9C?&IU	O??uۙr?Р7?]? 2?K?ߒ0?o??ɡ???ʐ?0o???_????P?????!?]??????u???e? ????fz??3J/???YSs?G??????>?%a?PY?Ƣ_r?̖r.{?j?u???GM?$p1N2??*?C_??%_# ??;d?V?? ???
?????!??n??NW?MHy찒??N??O??
??2M]??ke?Iv??y?m,?)?!?$4?x???f??'E?HҺG=39:T?y?tFeH?W???]?X?S=?B??s]??? 0???orP|?????<?L|;F???a??0??b?u???S?????$'??@????pV?T?>b??#?T=?????\?>8???!!S0	h\?i9*???r??:Ws??jS?*?4?&?C?A\~? ????Mޕ??k0??`?+5E???
]?+??n3)
???UQ?Y?Ϋ%??[???	?`???ڶ???.?Ԣ?{?a?_(
????7iη?e!??;?3B?oW?p?}H???? ?P2?K?qg?c!?(4?]
?0cY??R<G?x?ͭ??@8?i????=?" ž?&{????8?7?h??`c?a?
c???????Z???3q?t?h?r??$C"o???\|]0?D????_H???4?( Ni??????C??O????Sb????S?Nyn??wV?PdsIUm?o?U??שk??#$????ӟ>h˼W_?"??,?̲2d
1į?Tk??????t??1?={?~??2d??l??ҼO*?1j$g???I:4dܑ????1?`/??Ȑ??b?wC???'c?#=Yț?Q?	L???KÓl?J??Ev:?OO%Gl.lmN????t??"(??Б???L?Gx?9O}???2????N9??W?ny?@cVo4?????R)?TGua?`??P?V??s?j?5??0J0A????8???h?Kw?*V??P??b?/?[2w??=?+KH(
$??썩?bNٚb?C?)??????i?:?"d??ޏ?????~]f?= ????9??.?3???Yc???9R?F??W??9??*?Z??xj؊=?!ו??݋?????4???'?A쮷?^???~?QIo???!?`???Æg&yЩ84 ?n??;Ҥ\?	?mtM????!?.??ď???j?z?mr?Te???^/M???^((??c?Iq??b7?!????????!?????i?)?֫?תH??/yR?S?N????_ïDH?4~??s??>?W?U7G-C????G'C?){???????q?v?K?kX>?2?/y?????z?0a?0agr?^?E??#?{]?h{?P?? ??|????cex????Bg?????C???hh?v???+????߱?q???2??b?mT????lJ??4????6S?ǝY?#&Orts??;9??֩???b!FeH???:?	?yr2??np?u????\m??sa??  T?tx????P?#?~??2?Uj ?w1?}	??yX^?$???MR?V?<pH?0a0?UV???O(?P`eF?'	??ɈS츍?1`??)p??T??N??wn̩N&???N?d?]?Vq?,??5ؼ??H?l!?y??*??E???]??7??v/???.??۫.?ۘ.B,???????[m???#^??^E2????ب???o?)??{zѨ.6\?Q?dN?˜BǚF??H?`a,?ta-?9H??MIQ^??X{ ??#\????+?dx?^6?6s#?r?"??(?gl1m?f]?˘????,_?o1??0???s???ux?b@
?C?h?{??u0??ǯ?(??bl????????L??X??fwP^?T??????????;??ظ6!l?x???L~?<?`?=T???,4??!?;??>? ?'U??y??8{?"????9?+Z?h??:{????[[??U?=?|27???%A?pc2d?V??@?Ğ?t:Aw?? ?mc??9?#E? ??????7FgϽ?п??@?k???߲_f?_??x??I??w??dҁ~?s?pGV???5??TC&6??_~?H????????뱗?Ǧ?jO]?:?ӉRA??A?=???TR5P?Rr??(잒?lbkn??^??Gj[??lg?5???F{+29??>`???\?r?????2 z7y????????      ?   ?   x?U?k?!??b-?ý?4U?3?]?ՌIC??;?)(4p$@G???Beߙ
ז7???[????I???h%???Ƿ2??o?R?L??????Ι?*???)??*|?=?????M??J|??)?B=~Kf,X?1?%-]?PVO;?$'??qz??J-_:E^??rz??N?až??r)i?R???A?Z?m?^?      	   ?   x????m?0D?d??
?JkI?u??^/?8??`?9YL?
?c?2~?<??Cw?v2Ǡk????6(/Ќ@?1OK??y3ȁ???ba?Ӑ?@?Ӹߩ	?z?ʧӐW?㮩jA`z?a?Ӑwau??ۗ/?l?Z???????5????h(L??e?	Yg2???LA?:Ek???Y&?<?!??0?????ɿ?W??24??s?#??-?????~D????         ?   x????j?0E????4X?????A?o3??8?`_?{E????=?^??i?R?}^?{+???̚?K???V???#??????#?????^kӚ??#?O1?E?[?{K?????,Fv?4i??|[??n???????8?Y??????4Hj?!??܉)jć?cY/F}8?y˲??@DxҊ?!??p@?9L?~?Wyv??@???|?x?L?1x ?
u|?N      ?   ?  x?u??n?0??'O??ۉ!dU(???R?2\ԍ	!1Il H?f?e^????2??g????Cj????1?G??"??އ?)?1pc??2??He_O?q???V?)y ??:i??	??4R??'?1H?????мBp%?&Y???3???nt???pT??
?ؚT]???]8B?|?i?.
N	?<9?1??˿?E?z?Ù?6?l?c????J???x?Z???&???$U??L??p???*l???'???'y??z????g???R???/+?D?2?'.S?N?^?݉`c?????L#?py??fo5}Z?-?D????$G???.??9?l??}????c?J??+??%?<(-??[9?R??:~2?0H??????W???ˡ㍙w?s4?Jv??靪a????\8?????oʇ?%Z|?%L?&Ly
?,????L?m??N[65n?qY?;?4??]??     