INSERT INTO regiao (regiao) VALUES 
('Sudeste'),
('Sul'),
('Nordeste'),
('Norte'),
('Centro-Oeste');

INSERT INTO frota (nome_frota, regiao) VALUES 
('Frota Paulista', 1),
('Frota Gaúcha', 2),
('Frota Nordestina', 3),
('Frota Amazônica', 4),
('Frota Central', 5);

INSERT INTO caminhao (nome_caminhao, capacidade, frota, descritivo, consumo) VALUES 
('Volvo FH 540', 30000, 1, 'Caminhão pesado para longas distâncias', 3),
('Scania R500', 28000, 2, 'Caminhão eficiente para estradas do sul', 4),
('Mercedes Actros', 25000, 3, 'Caminhão versátil para o nordeste', 5),
('Volkswagen Constellation', 20000, 4, 'Caminhão resistente para terrenos acidentados', 6),
('Ford Cargo 2429', 18000, 5, 'Caminhão para transporte regional', 7),
('DAF XF 480', 32000, 1, 'Caminhão de grande capacidade para o sudeste', 3),
('Iveco Hi-Way', 26000, 2, 'Caminhão com tecnologia de ponta', 4),
('MAN TGX', 24000, 3, 'Caminhão econômico para o nordeste', 5),
('Renault T480', 22000, 4, 'Caminhão confiável para a região norte', 6),
('Hyundai HD78', 15000, 5, 'Caminhão leve para transporte urbano', 8);