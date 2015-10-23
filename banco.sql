
--
-- Banco de dados: `r`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL,
  `title` char(70) NOT NULL,
  `body` longtext NOT NULL,
  `slug` char(70) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `task`
--

INSERT INTO `task` (1, 'Inicial', 'Bem vindo ao R, seu assistente pessoal que vai te lembrar suas tarefas por e-mail. Basta informar ao R por dentro do administrador qual tarefa deseja que ele te lembre e ele lhe enviará um e-mail na mesma hora todos os dias até que você conclua a tarefa. Para que o R pare de lhe notificar é necessário excluir a tarefa por dentro do administrador. As tarefas listadas no menu são as tarefas ativas.', 'home', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` char(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` char(50) NOT NULL,
  `senha` char(61) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `usuario`, `senha`) VALUES
(1, 'Administrador', 'admin@admin.com', 'admin', '$2y$12$wsGcdp9tjysGEWwLvdy/HOFPxOJO3bXeb2bg0gQtdzM/eMPb4qgC.');

