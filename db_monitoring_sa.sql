PGDMP               	        |            db_monitoring_sa    16.3    16.3 2    K           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            L           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            M           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            N           1262    16416    db_monitoring_sa    DATABASE     r   CREATE DATABASE db_monitoring_sa WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'C';
     DROP DATABASE db_monitoring_sa;
                postgres    false            �            1259    16438 	   tbl_brand    TABLE     n   CREATE TABLE public.tbl_brand (
    id integer NOT NULL,
    brand text,
    rasa text,
    seasoning text
);
    DROP TABLE public.tbl_brand;
       public         heap    postgres    false            �            1259    16663    tbl_cr_fcp_detail    TABLE     S  CREATE TABLE public.tbl_cr_fcp_detail (
    sampel integer,
    ts double precision,
    seasoning_nacl double precision,
    nacl double precision,
    cr double precision,
    status text,
    id integer NOT NULL,
    id_sa integer,
    waktu text,
    standar text,
    result text,
    loop integer,
    tanggal date,
    line text
);
 %   DROP TABLE public.tbl_cr_fcp_detail;
       public         heap    postgres    false            �            1259    16662    tbl_cr_fcp_detail_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_cr_fcp_detail_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tbl_cr_fcp_detail_id_seq;
       public          postgres    false    228            O           0    0    tbl_cr_fcp_detail_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tbl_cr_fcp_detail_id_seq OWNED BY public.tbl_cr_fcp_detail.id;
          public          postgres    false    227            �            1259    16654    tbl_cr_tws_detail    TABLE     �  CREATE TABLE public.tbl_cr_tws_detail (
    sampel integer,
    ts double precision,
    seasoning_nacl double precision,
    base_nacl double precision,
    fg_nacl double precision,
    nacl double precision,
    cr double precision,
    status text,
    id integer NOT NULL,
    id_sa integer,
    waktu text,
    standar text,
    result text,
    loop integer,
    tanggal date,
    line text
);
 %   DROP TABLE public.tbl_cr_tws_detail;
       public         heap    postgres    false            �            1259    16653    tbl_cr_tws_detail_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_cr_tws_detail_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tbl_cr_tws_detail_id_seq;
       public          postgres    false    226            P           0    0    tbl_cr_tws_detail_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tbl_cr_tws_detail_id_seq OWNED BY public.tbl_cr_tws_detail.id;
          public          postgres    false    225            �            1259    16618    tbl_loop    TABLE     S   CREATE TABLE public.tbl_loop (
    loop integer,
    line text,
    bagian text
);
    DROP TABLE public.tbl_loop;
       public         heap    postgres    false            �            1259    16431 
   tbl_produk    TABLE     ;  CREATE TABLE public.tbl_produk (
    kode bigint NOT NULL,
    brand text,
    rasa text,
    size text,
    tanggal date,
    seasoning text,
    nama_produk text,
    standar text,
    green_min double precision,
    green_max double precision,
    yellow_min double precision,
    yellow_max double precision
);
    DROP TABLE public.tbl_produk;
       public         heap    postgres    false            �            1259    16445 	   tbl_sa_pc    TABLE       CREATE TABLE public.tbl_sa_pc (
    tanggal date,
    brand text,
    size text,
    seasoning text,
    analis text,
    field text,
    shift text,
    regu text,
    rasa text,
    line text,
    nama_produk text,
    kode bigint,
    id integer NOT NULL,
    loop integer
);
    DROP TABLE public.tbl_sa_pc;
       public         heap    postgres    false            �            1259    16503    tbl_sa_pc_detail    TABLE     w  CREATE TABLE public.tbl_sa_pc_detail (
    sampel integer,
    seasoning_nacl double precision,
    base_nacl double precision,
    fg_nacl double precision,
    nacl double precision,
    sa double precision,
    status text,
    id integer NOT NULL,
    id_sa integer,
    waktu text,
    standar text,
    result text,
    loop integer,
    tanggal date,
    line text
);
 $   DROP TABLE public.tbl_sa_pc_detail;
       public         heap    postgres    false            �            1259    16590    tbl_sa_pc_detail_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sa_pc_detail_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_sa_pc_detail_id_seq;
       public          postgres    false    219            Q           0    0    tbl_sa_pc_detail_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_sa_pc_detail_id_seq OWNED BY public.tbl_sa_pc_detail.id;
          public          postgres    false    221            �            1259    16510    tbl_sa_pc_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sa_pc_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tbl_sa_pc_id_seq;
       public          postgres    false    218            R           0    0    tbl_sa_pc_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tbl_sa_pc_id_seq OWNED BY public.tbl_sa_pc.id;
          public          postgres    false    220            �            1259    16637    tbl_sa_ts_detail    TABLE     <  CREATE TABLE public.tbl_sa_ts_detail (
    sampel integer,
    seasoning_nacl double precision,
    fg_nacl double precision,
    sa double precision,
    status text,
    id_sa integer,
    waktu text,
    standar text,
    result text,
    loop integer,
    tanggal date,
    line text,
    id integer NOT NULL
);
 $   DROP TABLE public.tbl_sa_ts_detail;
       public         heap    postgres    false            �            1259    16644    tbl_sa_ts_detail_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sa_ts_detail_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_sa_ts_detail_id_seq;
       public          postgres    false    223            S           0    0    tbl_sa_ts_detail_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_sa_ts_detail_id_seq OWNED BY public.tbl_sa_ts_detail.id;
          public          postgres    false    224            �            1259    16424    tbl_user    TABLE     �   CREATE TABLE public.tbl_user (
    nama text,
    username integer NOT NULL,
    password text,
    regu text,
    plant text,
    nik integer
);
    DROP TABLE public.tbl_user;
       public         heap    postgres    false            �           2604    16666    tbl_cr_fcp_detail id    DEFAULT     |   ALTER TABLE ONLY public.tbl_cr_fcp_detail ALTER COLUMN id SET DEFAULT nextval('public.tbl_cr_fcp_detail_id_seq'::regclass);
 C   ALTER TABLE public.tbl_cr_fcp_detail ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227    228            �           2604    16657    tbl_cr_tws_detail id    DEFAULT     |   ALTER TABLE ONLY public.tbl_cr_tws_detail ALTER COLUMN id SET DEFAULT nextval('public.tbl_cr_tws_detail_id_seq'::regclass);
 C   ALTER TABLE public.tbl_cr_tws_detail ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    225    226            �           2604    16511    tbl_sa_pc id    DEFAULT     l   ALTER TABLE ONLY public.tbl_sa_pc ALTER COLUMN id SET DEFAULT nextval('public.tbl_sa_pc_id_seq'::regclass);
 ;   ALTER TABLE public.tbl_sa_pc ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    218            �           2604    16591    tbl_sa_pc_detail id    DEFAULT     z   ALTER TABLE ONLY public.tbl_sa_pc_detail ALTER COLUMN id SET DEFAULT nextval('public.tbl_sa_pc_detail_id_seq'::regclass);
 B   ALTER TABLE public.tbl_sa_pc_detail ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    219            �           2604    16645    tbl_sa_ts_detail id    DEFAULT     z   ALTER TABLE ONLY public.tbl_sa_ts_detail ALTER COLUMN id SET DEFAULT nextval('public.tbl_sa_ts_detail_id_seq'::regclass);
 B   ALTER TABLE public.tbl_sa_ts_detail ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223            =          0    16438 	   tbl_brand 
   TABLE DATA           ?   COPY public.tbl_brand (id, brand, rasa, seasoning) FROM stdin;
    public          postgres    false    217   �<       H          0    16663    tbl_cr_fcp_detail 
   TABLE DATA           �   COPY public.tbl_cr_fcp_detail (sampel, ts, seasoning_nacl, nacl, cr, status, id, id_sa, waktu, standar, result, loop, tanggal, line) FROM stdin;
    public          postgres    false    228   �=       F          0    16654    tbl_cr_tws_detail 
   TABLE DATA           �   COPY public.tbl_cr_tws_detail (sampel, ts, seasoning_nacl, base_nacl, fg_nacl, nacl, cr, status, id, id_sa, waktu, standar, result, loop, tanggal, line) FROM stdin;
    public          postgres    false    226   5>       B          0    16618    tbl_loop 
   TABLE DATA           6   COPY public.tbl_loop (loop, line, bagian) FROM stdin;
    public          postgres    false    222   �>       <          0    16431 
   tbl_produk 
   TABLE DATA           �   COPY public.tbl_produk (kode, brand, rasa, size, tanggal, seasoning, nama_produk, standar, green_min, green_max, yellow_min, yellow_max) FROM stdin;
    public          postgres    false    216   a?       >          0    16445 	   tbl_sa_pc 
   TABLE DATA           �   COPY public.tbl_sa_pc (tanggal, brand, size, seasoning, analis, field, shift, regu, rasa, line, nama_produk, kode, id, loop) FROM stdin;
    public          postgres    false    218   �@       ?          0    16503    tbl_sa_pc_detail 
   TABLE DATA           �   COPY public.tbl_sa_pc_detail (sampel, seasoning_nacl, base_nacl, fg_nacl, nacl, sa, status, id, id_sa, waktu, standar, result, loop, tanggal, line) FROM stdin;
    public          postgres    false    219   �B       C          0    16637    tbl_sa_ts_detail 
   TABLE DATA           �   COPY public.tbl_sa_ts_detail (sampel, seasoning_nacl, fg_nacl, sa, status, id_sa, waktu, standar, result, loop, tanggal, line, id) FROM stdin;
    public          postgres    false    223   0E       ;          0    16424    tbl_user 
   TABLE DATA           N   COPY public.tbl_user (nama, username, password, regu, plant, nik) FROM stdin;
    public          postgres    false    215   �E       T           0    0    tbl_cr_fcp_detail_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_cr_fcp_detail_id_seq', 5, true);
          public          postgres    false    227            U           0    0    tbl_cr_tws_detail_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_cr_tws_detail_id_seq', 9, true);
          public          postgres    false    225            V           0    0    tbl_sa_pc_detail_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_sa_pc_detail_id_seq', 76, true);
          public          postgres    false    221            W           0    0    tbl_sa_pc_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.tbl_sa_pc_id_seq', 51, true);
          public          postgres    false    220            X           0    0    tbl_sa_ts_detail_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_sa_ts_detail_id_seq', 16, true);
          public          postgres    false    224            �           2606    16444    tbl_brand tbl_brand_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.tbl_brand
    ADD CONSTRAINT tbl_brand_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.tbl_brand DROP CONSTRAINT tbl_brand_pkey;
       public            postgres    false    217            �           2606    16670 (   tbl_cr_fcp_detail tbl_cr_fcp_detail_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.tbl_cr_fcp_detail
    ADD CONSTRAINT tbl_cr_fcp_detail_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.tbl_cr_fcp_detail DROP CONSTRAINT tbl_cr_fcp_detail_pkey;
       public            postgres    false    228            �           2606    16661 (   tbl_cr_tws_detail tbl_cr_tws_detail_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.tbl_cr_tws_detail
    ADD CONSTRAINT tbl_cr_tws_detail_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.tbl_cr_tws_detail DROP CONSTRAINT tbl_cr_tws_detail_pkey;
       public            postgres    false    226            �           2606    16624    tbl_produk tbl_produk_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.tbl_produk
    ADD CONSTRAINT tbl_produk_pkey PRIMARY KEY (kode);
 D   ALTER TABLE ONLY public.tbl_produk DROP CONSTRAINT tbl_produk_pkey;
       public            postgres    false    216            �           2606    16598 &   tbl_sa_pc_detail tbl_sa_pc_detail_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.tbl_sa_pc_detail
    ADD CONSTRAINT tbl_sa_pc_detail_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.tbl_sa_pc_detail DROP CONSTRAINT tbl_sa_pc_detail_pkey;
       public            postgres    false    219            �           2606    16518    tbl_sa_pc tbl_sa_pc_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.tbl_sa_pc
    ADD CONSTRAINT tbl_sa_pc_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.tbl_sa_pc DROP CONSTRAINT tbl_sa_pc_pkey;
       public            postgres    false    218            �           2606    16652 &   tbl_sa_ts_detail tbl_sa_ts_detail_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.tbl_sa_ts_detail
    ADD CONSTRAINT tbl_sa_ts_detail_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.tbl_sa_ts_detail DROP CONSTRAINT tbl_sa_ts_detail_pkey;
       public            postgres    false    223            �           2606    16430    tbl_user tbl_user_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.tbl_user
    ADD CONSTRAINT tbl_user_pkey PRIMARY KEY (username);
 @   ALTER TABLE ONLY public.tbl_user DROP CONSTRAINT tbl_user_pkey;
       public            postgres    false    215            =   �   x���A�0�u�=��YZBd�@wn�)��H�׷%����2>#a�t�{""A"�9�oH�%I��sg-ž�7� �${Ȏ��h![y��(���˘0�/m��dyb3����������c]��#C2�ݚ�r?!�馨��v0�y:�?M�#0���MNYh���2`|Ea|��3�. xcp^�      H   �   x��ν
�@F���S�4��u�V�k��&(�B|{7B$��3�a)%H"KB���G�Ϗ�$��a�N�Aci�W����BY=pX��*�y[ꦿ��l�d2���$�C]�`̗En�G�O��t�G����Z'Ж���Ϊ���1��z����/�D      F   �   x��α
�0���˓�pw��>�
..��(� }{�"Ejqp��;~��A���
�������SPKؕ���H �X��^m1���=�	B��Z/��q��[��o&>V>66�U�u¿��I��[�U>��ے�%�T��u[���,����>�˽��J�)8�^8�L�      B   j   x�Uʻ
�0D�z�c�5��:[���M*��B��5
�S��#4XU��ùnWH��H����EvH)�ΖϮgy^�8�rUi�M~��DŹ&?���e-9;�0�|2�ET      <   i  x���;k�@��_�R>��v�%���0q��.��@D),�����3ā>���hvf��~o�S�	�K�����ѐ����Ɏ�B���.3�C�@�	��Q"�*�X�P�hVo*aP/�M�n��,�TZ�^�xt�����NŞ�h��t>_��6@q��ެ��.!-�('��0��(G)F�V�c�1�]۽��� �X�%�[SZ(-T�Y1�'�*�$�T,��K���q�4�������p�����Z�QN����HRn��i��*ͅ��)}-���p��Uo�$CiК���܂$�'���"xV���1��]�R�;b�.��p�v��ρo���Ԣ�q(�!��R�����      >   �  x���Qk�0ǟ�O�瀒\�6}��1���:����	�����~W�MԬ������/��e��]� ��UQ-Aг)6�,x���Z�(Їt��8r��җ�	�5��{Nb8�4���eEP-�B<�!$�;�&�>!��"�X�����?9�msE�AD�LP�r��=4/V�����Aʨ@'��T�EH}��Z\#֋���zqї�8�Mo�K8�g[L�|Q+|%��3�����O�ܡ�����q�<$���t���?�`�U�+Z���.�qW�|ep���F1�-�A��i��]^Z���z&�1<�nv?��kn�3�1��@J�=����`�["��t��(�;��xxHg�͟<Ќ�E��H��X�ٛE&��w��4��y����������϶��͕��r^���*#�ը'���*���(�M@|J����';k��Ķ�w0��779��H�NS�ߨ�^����E      ?   S  x���K��@������ȯy$[�,� �x�*�^��cO�Lӆ�w3m����񱇀803`` ;�k�g(A(���0~|!'��	<� إ�����Y;�;���%鎀4�i�!��=�J^ȑ�j����4H����VxǗ�D�%%W��q�rq�|�J�%����������U��k�j<��h%ԫX�[UdQo�h�[�ߓὕ�$&���!j�Ҁwq�r+�Go�0Ag����bl�D�X�z�~?op-��w���"J-��f�
�;�'a�U���]�FCih�4�e�p���%�ER�����$ץU[�}�Q(;ʀW��͚����ݾ�|����rku�+�VCθ���rO<ރ����ph!��z�BJg�t�񥡛ٹK���ٻM�f$�35q��fǮ�D1�ޥd���ޱhr%� X&���K�E13R��p�Ľ�W�j2�Τ�՗,���?K%#�Gu��nd��y	τ^(%��v7�M�׻���8ɶ�yͫb�*�a�Ҽ�����
�p��4b�L(�4�8�nݸ	��U�>�UڰL-�Y}x��ͫk}sMrŐӝ�\| 6��|�C��v� ǰ��      C   �   x��ν
�@�z�)Rjq��ܙx���6�� b������([l1|3
Q2����de������n�ܴ��V��rg�k\G��@YK�!�{��R0�sw?M"����A�3!e1~zcV#Ҵ��(Zg��#��^\-      ;   B   x��L�L�P��45046614�442����S(��L+�4410��q%��f�U��H������� ���     