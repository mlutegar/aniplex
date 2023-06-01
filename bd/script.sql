create database if not exists aniplex;
use aniplex;

create or replace table login(
    id int primary key auto_increment,
    user varchar(240) not null,
    age int not null,
    foto longtext not null,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    cargo int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table manga(
    id int primary key auto_increment,
    titulo varchar(250) not null,
    anime varchar(250) not null,
    volume int not null,
    categoria varchar(250) not null,
    sumario longtext not null,
    capa longtext not null,
    conteudo longtext,
    nota int not null,
    acesso int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table musica(
    id int primary key auto_increment,
    nome_musica varchar(250) not null,
    anime varchar(250) not null,
    duracao varchar(250) not null,
    capa longtext not null,
    conteudo longtext,
    nota int not null,
    acesso int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table filme(
    id int primary key auto_increment,
    titulo varchar(250) not null,
    diretor varchar(250) not null,
    duracao varchar(250) not null,
    categoria varchar(250) not null,
    sumario longtext not null,
    capa longtext not null,
    nota int not null,
    acesso int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create or replace table favorite(
    favorite_id int primary key auto_increment,
    favorite_by int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP,
    CONSTRAINT FK_UserID FOREIGN KEY (favorite_by) REFERENCES login(id) on delete cascade
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into login(user, age, email, senha, cargo) values('admin', 100, 'admin@manga.com', md5('admin123'), 1);
insert into manga(titulo, capa, conteudo, anime, volume, categoria, sumario, nota) values
    ("Bleach - Vol.1", "https://static3.mangalivre.net/capas/yz9Ih-chRWHC4_EwUEh87Q/12470/6070485866f5dexternal_cover.jpg", "?", "Bleach", 1, "Shounen", "A história gira em torno de Kurosaki Ichigo um estudante de 15 anos que tem uma estranha capacidade de ver, tocar e falar com espíritos de pessoas mortas. Logo que o Shinigami (Deus da Morte) Kuchiki Rukia toma conhecimento dos poderes dele ela decide investigá-lo, e acaba em uma luta com um Hollow que foi atraído pelo forte poder espiritual de Ichigo, antes de ser derrotada pela criatura, Rukia passa seus poderes a Ichigo, o qual se torna um Shinigami, e após derrotar o Hollow ingressa em uma jornada para proteger os humanos e os espíritos da ameaça dos Hollows.", 9),
    ("The God of Highschool - Vol.1", "https://static3.mangalivre.net/capas/whGb5uDbZIm8q-0Q7_RZ2w/428/62644409f151d_external_cover.jpg", "?", "The God of Highschool", 1, "Shounen", "Enquanto uma ilha desaparece pela metade da face do planeta, uma organização misteriosa está enviando convites para cada lutador habilidoso da Terra para participarem de um torneio. Se você vencer, você pode ter O QUE QUISER?. Eles estão recrutando apenas os melhores para lutarem com os melhores e clamar o título de The God of HighSchool!", 9),
    ("Tokyo Revengers - Vol.1", "https://static3.mangalivre.net/capas/c-aH6sSjILEMLNO--UVDMg/6950/613881e16f42fexternal_cover.jpg", "?", "Tokyo Revengers", 1, "Shounen", "Takemichi é um virgem desempregado de 26 anos que descobre que a garota que ele namorou durante o ensino médio - a única que ele já namorou - morreu. Então, após um acidente ele se encontra de volta ao passado, durante seus anos de ensino médio. Ele promete mudar o futuro e salvar a garota, e para isso, ele planeja subir até o topo da gangue de delinquentes mais brutal da região de Kantou. ", 8),
    ("Kimetsu no Yaiba - Vol.23", "https://static3.mangalivre.net/capas/lRAq3QFSQQWlYp4-XojAOw/3364/6037ed57c7fd3external_cover.jpg", "?", "Kimetsu no Yaiba", 23, "Shounen", "O mangá conta a história de Tanjiro, o filho mais velho de uma família que é massacrada por um demônio e, a única sobrevivente do incidente foi umas das suas irmãs, que por causa do massacre acaba se transformando em um demônio. Então, o protagonista, Tanjiro, sai em uma jornada para tentar achar uma ''cura'' para a sua irmã...", 9),
    ("One Punch Man - Vol.23", "https://static3.mangalivre.net/capas/GobD71Oud_WrETBGiOKj5A/1036/6029419421cd0external_cover.jpg", "?", "One Punch Man", 23, "Super Hero Comic", "Conta o dia-a-dia de um herói normal que está infeliz por ser forte o bastante para derrotar todos os seus oponentes com apenas um soco, já que isso não lhe traz mais a sensação de adrenalina ao enfrentar um inimigo poderoso...", 8),
    ("One Piece - Vol.1", "https://static3.mangalivre.net/capas/gCELLr4DNpa4XBAy0RjmtA/13/623e0f34a0ce7_external_cover.jpg", "?", "One Piece", 1, "Shounen", "One Piece começa quando Gol D. Roger, o Rei Dos Piratas que possuiu tudo nesse mundo, antes de ser executado, diz que escondeu o seu tesouro em algum lugar da Grand Line, um oceano extremamente perigoso. Desde então muitos piratas se aventuram pela Grand Line para tentar encontrar o tesouro chamado One Piece. Um deles é Monkey D. Luffy, o garoto que, acidentalmente, comeu uma das Akuma No Mi, a Gomu Gomu No Mi (Fruta da Borracha), e agora ele pode esticar seu corpo como se fosse uma borracha. A jornada dele começa atrás de companheiros e um barco, que ele vai conseguindo pouco a pouco, pois tem um objetivo: Ser o Rei Dos Piratas!!", 8),
    ("Black Clover - Vol.32", "https://static3.mangalivre.net/capas/OnrJwCIG8TXGkSojBye8Kg/1751/6247bfcc81ab9_external_cover.jpg", "?", "Black Clover", 32, "Shounen", "Em um mundo em que até as tarefas mais simples do dia a dia são feitas com o uso de magia, quem não consegue usá-la é tratado como nada! Esta é a vida de Asta, um jovem que mesmo sem um pingo de magia, sonha em se tornar o Mago Imperador, o mais forte de todos os magos! Com muito esforço e trabalho duro, será ele capaz de atingir seus objetivos e superar seu genial rival e amigo de infância, Yuno?!!", 7),
    ("Monster - Vol.1", "https://static3.mangalivre.net/capas/LfcOCufAI2mCkoyixaDf1g/1335/external_cover.jpg", "?", "Monster", 1, "Seinen", "A aterrorizante história começa quando o Dr. Tenma, o mais jovem e renomado neurocirurgião do Hospital Memorial Eisler de Dusseldorf, desobedece as ordens de seu chefe (e sogro) e ao invés de salvar a vida do prefeito da cidade, salva a de uma criança (já que ela havia chegado ao pronto socorro antes do prefeito). Como consequência, o prefeito recebe cuidados médicos abaixo do necessário e morre. Tenma sente-se feliz por ter feito a escolha certa mas as consequências viriam a seguir... Consequências FATAIS! Quais serão elas?", 9),
    ("Jujutsu Kaisen - Vol.15", "https://static3.mangalivre.net/capas/a3QXgz41RaXH1M3QeHuZ5A/7178/603a47c046ee3external_cover.jpg", "?", "Jujutsu Kaisen", 15, "Shounen", "Jujutsu Kaisen Yuji é um gênio do atletismo, mas não tem interesse algum em ficar correndo em círculos. Ele é feliz como membro no Clube de Estudo de Fenômenos Psíquicos. Apesar de estar no clube apenas por diversão, tudo fica sério quando um espírito de verdade aparece na escola! A vida está prestes a se tornar muito interessante na Escola Sugisawa...", 9),
    ("Hunter x Hunter - Vol.26", "https://static3.mangalivre.net/capas/XcOUGVTSAikS3oMtG79h4Q/59/external_cover.jpg", "?", "Hunter x Hunter", 26, "Shounen", "Hunters são uma raça especial, dedicada a rastrear tesouros, animais mágicos, e até mesmo outros homens. Mas tais atividades requerem uma licença, e menos de um em cem mil pode passar no exame de qualificação esgotante. Aqueles que não passam tem acesso a áreas restritas, lojas de incríveis informações, bem como o direito de chamar-se de Hunters.", 9),
    ("Fullmetal Alchemist - Vol. 4", "https://static3.mangalivre.net/capas/iW4tQx0bAIZGA_3CcIDt7Q/5/external_cover.jpg", "?", "Fullmetal Alchemist", 4, "Shounen", "As regras do estado da alquimia que para ganhar algo, deve-se perder alguma coisa de igual valor. A alquimia é o processo de desmontar e reconstruir um objeto em uma entidade diferente, com as regras da alquimia para governar este procedimento. No entanto, existe um objeto que pode trazer qualquer alquimista acima dessas regras, o objeto conhecido como Pedra Filosofal. O jovem Edward Elric é um alquimista particularmente talentoso que através de um acidente anos atrás perdeu seu irmão mais novo, Alphonse e uma de suas pernas. Sacrificar um de seus braços assim, ele usou a alquimia para ligar a alma de seu irmão a uma armadura. Isso levou ao início de sua jornada para recuperar seus corpos, em busca da lendária Pedra Filosofal.", 10),
    ("Naruto - Vol. 12", "https://static3.mangalivre.net/capas/EjvoRCrtbg8u15ewyND_4g/1/5f8b2f63f1b70external_cover.jpg", "?", "Naruto", 12, "Shounen", "Naruto Uzumaki é um menino que vive em Konohagakure no Sato ou simplesmente Konoha ou Vila Oculta da Folha, a vila ninja do País do Fogo. Quando ainda bebê, Naruto teve aprisionada em seu corpo a Kyuubi no Youko por Minato Namikaze (quarto Hokage, e seu pai), com a finalidade de salvar a Vila da Folha. Desde então, Naruto é visto por muitas pessoas como um monstro, não só pelos familiares das pessoas mortas pela Kyuubi, mas também por pessoas que não toleram suas brincadeiras, já que o mesmo é extremamente hiperativo, incompreendido e solitário. Naruto sonha em se tornar o Hokage de sua vila, um ninja poderoso e respeitado, para assim poder ser reconhecido por todos.", 9),
    ("Berserk - Vol. 3", "https://static3.mangalivre.net/capas/75i1MyyphXB1YA_3NuQ8vg/117/external_cover.jpg", "?", "Berserk", 3, "Seinen", "Gatts é um sobrevivente que vaga pelo mundo à procura de respostas. Antigo membro do ext 'Bando dos Falcões', um grupo mercenário de cavaleiros e guerreiros liderado por Griffith e Caska, Gatts se adentra na história que ganha corpo e emerge sob um ponto de vista totalmente imprevisível, a medida que os acontecimentos vão se completando. É uma obra dedicada à eterna luta do Catolicismo contra Paganismo....", 8),
    ("Haikyuu - Vol. 8", "https://static3.mangalivre.net/capas/uH9E_OvryCF2gFFI97qjTw/805/601ead45b1da7external_cover.jpg", "?", "Haikyuu", 8, "Esporte", "Hinata Shouyou, ao ver uma partida de voleibol, fica fascinado com 'o Pequeno Gigante', um habilidoso jogador de vôlei, decidindo-se junta-se clube de vôlei de sua escola, no entanto ele é o único membro do clube. Após 3 anos ele finalmente completar o time e ruma para a disputa do Torneio de Primavera. No entanto seu primeiro oponente de cara é o preferido das finais. É neste momento que ocorre o encontro de Hinata com Kageyama Tobio, o 'Rei da Quadra'!!!", 10),
    ("Dr. Stone - Vol. 49", "https://static3.mangalivre.net/capas/3XHD60qUP5WHzyxyMLKv3g/4948/62c621fe1d315_external_cover.jpg", "?", "Dr. Stone", 49, "Shounen", "Durante 5 anos, Taiju Ooki tentou se confessar para o amor de sua vida, Yuzuriha, mas nunca conseguiu. Um dia ele decide reunir toda sua coragem para dizer a ela tudo o que sente... Mas EXATAMENTE nessa hora uma CATÁSTROFE de proporções globais extingue toda a humanidade transformando-a em pedra. Como únicos sobreviventes (até então) cabe a Taiju e seu brilhante amigo, o cientista Senkuu, fazerem a humanidade sair da Idade da Pedra, voltar a Era Moderna e salvar Yuzuriha!!!", 8);