﻿unit Jednotka1;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls, Vcl.ExtCtrls, Vcl.WinXCtrls, Vcl.Imaging.pngimage,
  Vcl.OleCtrls, SHDocVw;

type
  TMain = class(TForm)
    cola: TRadioButton;
    energy: TRadioButton;
    Labelvyber: TLabel;
    vyber: TLabel;
    Labelvloztemince: TLabel;
    pole: TEdit;
    Labelvlozeno: TLabel;
    Labelzbyvavlozit: TLabel;
    vlozeno: TLabel;
    zbyvavlozit: TLabel;
    spoctni: TButton;
    Nadpis: TLabel;
    reset: TButton;
    Bg: TImage;
    load: TActivityIndicator;
    Modryradek: TShape;
    odpocet: TTimer;
    Kc: TLabel;
    Kc2: TLabel;
    Putyka: TImage;
    Odkaz: TLinkLabel;
    Labeldekujeme: TLabel;
    procedure colaClick(Sender: TObject);
    procedure energyClick(Sender: TObject);
    procedure spoctniClick(Sender: TObject);
    procedure FormCloseQuery(Sender: TObject; var CanClose: Boolean);
    procedure resetClick(Sender: TObject);




  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  Main: TMain;
  X, kod, v, b, cenacola, cenaenergy, Z: integer;
  P, pole, vysledek1, vysledek2: string;
  canclose: boolean;

implementation

{$R *.dfm}

procedure TMain.colaClick(Sender: TObject);
begin
if cola.checked=true then
 begin
  Labelvloztemince.visible:=true;
  pole.Visible:=true;
  cenacola:= 14;
  cenacola:= Z;
  vyber.Caption:='Cola za 14Kč';
  vyber.Visible:=false;
  spoctni.visible:=true;
  Labelvyber.Visible:=false;

end;
end;

procedure TMain.energyClick(Sender: TObject);
begin
if energy.Checked=true then
 begin
 pole.Visible:=true;
 Labelvloztemince.visible:=true;
 cenaenergy:= 10;
 cenaenergy:= Z;
 vyber.Caption:='Energy za 10Kč';
 vyber.Visible:=false;
 spoctni.visible:=true;
 Labelvyber.Visible:=false;

 end;
 end;


procedure TMain.spoctniClick(Sender: TObject);
begin
reset.Visible:=true;
Labelvlozeno.visible:=true;
Labelzbyvavlozit.Visible:=true;
Labelvyber.visible:=true;
vyber.Visible:=true;
Labelvloztemince.visible:=true;
pole.Visible:=true;
odpocet.Enabled:=True;
kc2.Visible:=true;
kc.Visible:=true;


 val(pole.text,X,kod);
if cola.checked=true then
 begin
 Z:=14;
 v:=(Z-X);
  begin
  if X < Z then begin
               Labelzbyvavlozit.caption:= 'Vložte ještě: ';
               zbyvavlozit.Caption:=P;


               end;

  if X > Z then begin
                Labelzbyvavlozit.Caption:= 'Vracím';
                v:=(X-Z);
                zbyvavlozit.Caption:=P;

                end;
               end;

 str(X,vysledek1);
 str(v,vysledek2);
 vlozeno.Caption:=vysledek1;
 zbyvavlozit.caption:=vysledek2;
 load.Animate:=true;
 odpocet.interval:=1000;
 end;

val(pole.text,X, kod);

if energy.checked=true then
 begin
 Z:=10;
 v:=(Z-X);
  begin
  if X < Z then begin
               Labelzbyvavlozit.caption:= 'Vložte ještě: ';
               zbyvavlozit.Caption:=P;


               end;

  if X > Z then begin
                Labelzbyvavlozit.Caption:= 'Vracím';
                v:=(X-Z);
                zbyvavlozit.Caption:=P;

                end;
               end;

 str (v, P);
 str(X,vysledek1);
 str(v,vysledek2);
 vlozeno.Caption:=vysledek1;
 zbyvavlozit.caption:=vysledek2;
 load.Animate:=true;
 odpocet.interval:=1000;

 end;

end;






procedure TMain.FormCloseQuery(Sender: TObject; var CanClose: Boolean);
begin
canclose:=messagedlg('Děkujeme za nákup nápoje. Přijďte pro AvtomatAK opět. Opravdu chcete odejít?',mtconfirmation,[mbYes,mbNo],0)=mrYes;
end;

procedure TMain.resetClick(Sender: TObject);
begin
vlozeno.caption:='';
zbyvavlozit.caption:='';
vyber.caption:='';
Labelvloztemince.Visible:=false;
load.Animate:=false;
pole.text:=' ';
Labelvyber.Visible:=false;
Labelzbyvavlozit.Visible:=false;
Labelvlozeno.Visible:=false;
reset.Visible:=true;
spoctni.visible:=false;
kc.Visible:=false;
kc2.Visible:=false;
labeldekujeme.Visible:=false;
end;

end.






