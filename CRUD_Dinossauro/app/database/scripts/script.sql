CREATE TABLE IF NOT EXISTS dinossauros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    especie VARCHAR(100),
    peso DECIMAL(10,2),
    imagem TEXT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO dinossauros (nome, especie, peso, imagem) VALUES
('Tyrannosaurus Rex', 'Carnívoro', 8000, 'https://cdn.pixabay.com/photo/2017/01/31/13/14/dinosaur-2023387_1280.png'),
('Velociraptor', 'Carnívoro', 15, 'https://cdn.pixabay.com/photo/2016/03/31/19/58/dinosaur-1297303_1280.png'),
('Triceratops', 'Herbívoro', 6000, 'https://cdn.pixabay.com/photo/2013/07/13/12/46/dinosaur-160386_1280.png'),
('Brachiosaurus', 'Herbívoro', 35000, 'https://cdn.pixabay.com/photo/2014/04/02/16/20/dinosaur-307954_1280.png'),
('Stegosaurus', 'Herbívoro', 5000, 'https://cdn.pixabay.com/photo/2017/01/31/13/14/dinosaur-2023388_1280.png'),
('Spinosaurus', 'Carnívoro', 10000, 'https://cdn.pixabay.com/photo/2016/03/31/19/58/dinosaur-1297302_1280.png'),
('Ankylosaurus', 'Herbívoro', 6000, 'https://cdn.pixabay.com/photo/2013/07/13/12/46/dinosaur-160387_1280.png'),
('Allosaurus', 'Carnívoro', 2000, 'https://cdn.pixabay.com/photo/2017/01/31/13/14/dinosaur-2023389_1280.png');

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(20) NOT NULL DEFAULT 'usuario',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO usuarios (nome_usuario, email, senha, perfil)
VALUES ('admin', 'admin@email.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin');

-- admin@email.com 
-- admin123

//caso o login nao funcionar, acesse /usuarios e crie um usuario por lá

