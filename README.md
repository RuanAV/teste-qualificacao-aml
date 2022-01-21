
# Teste de Qualificação – Vaga Analista de Desenvolvimento / Implantação PLD 2022

---

## Questões

A – Com suas palavras explique o que é lavagem de dinheiro.  

B – O que é Cartão de Pagamento do Governo Federal (CPGF), e qual a sua finalidade.  

C – Quem pode utilizar o CPGF?  

D – Qual a URL onde é possível fazer o download dos arquivos do CPGF?  

E – Qual a URL da paǵina com a descrição dos campos (ou dicionário de dados) da CPGF?  

F – É possível identificar o nome e o documento do portador do CPGF, em todas as movimentações ou há movimentações onde não é possível identificar o portador?  

G – É possível identificar o Órgão do portador do CPGF?  

H - Qual o nome do Órgão cujo código é 20402?  

I - É possível identificar o Nome e Documento (CNPJ) dos favorecidos pela utilização do CPGF?  

J – É possível identificar a data e o valor das movimentações financeiras do CPGF, em todas as movimentações? Ou há movimentações onde não é possível identificar as datas e
ou valores?  

K (código) – Qual a soma total das movimentações utilizando o CPGF?  

L (código) – Qual a soma das movimentações sigilosas ?  

M (código) – Qual o Órgão que mais realizou movimentações sigilosas no período e qual o valor (somado)?  

N (código) – Qual o nome do portador que mais realizou saques no período? Qual a soma dos saques realizada por ele? Qual o nome do Órgão desse portador?  

O (código) – Qual o nome do favorecido que mais recebeu compras realizadas utilizando o CPGF?  

P - Descreva qual a abordagem utilizada para desenvolver o código para os ítens de K a O.

## Respostas

A - Lavagem de dinheiro é a prática de esconder a origem ilícita de ativos financeiros ou bens, de forma que parecem ser de origem lícita.  

B - O Cartão de Pagamento do Governo Federal (CPGF) é um meio de pagamento que proporciona à Administração Pública mais agilidade, controle e modernidade na gestão de recursos. O CPGF é emitido em nome do Cade, com identificação do portador.  

C - Quem pode utilizar os CPGFsão os órgãos públicos federais para pagamentos referentes a despesas próprias, que possam ser enquadradas como suprimento de fundos.  

D - <https://www.portaltransparencia.gov.br/download-de-dados/cpgf>  

E - <https://www.portaldatransparencia.gov.br/pagina-interna/603393-dicionario-de-dados-cpgf> 

F - Não, pois há movimentações onde não é possível identificar o portador por motivo de sigilo.  

G - Sim, é possível identificar pela quarta coluna do arquivo csv.  

H - O órgão cujo código é 20402 é a Agência Espacial Brasileira.

I - Nem sempre, há casos em que não é possível, seja por motivo de sigilo, falta de informação ou por não se aplicar.  

J - Existem movimentações onde não é possível identificar a data da movimentação, mas o valor sempre é possível de identificar.  

K (código) - Total das movimentações: R$ 5.619.007,95.  

L (código) - Total das movimentações sigilosas: R$ 3.108.731,15.  

M (código) - O órgão com mais movimentações foi o Departamento de Polícia Federal, e ele movimentou R$ 1.207.131,92.  

N (código) - O portador que mais realizou saques foi o R$ RAFAEL FERREIRA COSTA, sendo o seu órgão o R$ Instituto Chico Mendes de Conservação da Biodiversidade e a quantia sacada no período foi de R$ 24.520,00.  

O (código) - O favorecido que mais recebeu compras realizadas foi o MERCADOPAGO.COM REPRESENTACOES LTDA.  

P - Para desenvolver o código das quesões K a O eu utilizei a linguagem PHP~, versão 8.0.10, divindo as questões em funções que utilizam dos dados do csv que são acessados pela função chamada *getDataCsv*.