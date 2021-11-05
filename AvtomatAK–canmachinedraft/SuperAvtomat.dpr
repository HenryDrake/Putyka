program SuperAvtomat;

uses
  Forms,
  Jednotka1 in 'Jednotka1.pas'; {Objednavka AvtomatAK v.1}

{$R *.res}



{Do formuláře se načte Jednotka1.pas a spustí soubor s grafikou Jednotka1.dfm.}
begin
  Application.Initialize;
  Application.CreateForm(TMain, Main);
  Application.Run;
end.
