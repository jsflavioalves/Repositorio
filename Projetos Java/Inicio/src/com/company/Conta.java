package com.company;

public class Conta {
    int numero;
    String titular;
    double saldo;

    boolean saca(double valor) {
        if (this.saldo < valor) {
            return false;
        }
        else {
            this.saldo = this.saldo - valor;
            return true;
        }
    }
   
    void deposita(double quantidade) {
        this.saldo += quantidade;
    }
}

class Main {
    public static void main(String[] args) {
        Conta minhaConta;
        minhaConta = new Conta();
        minhaConta.titular = "Diego";
        minhaConta.saldo = 1000.0;
        
        Conta meuSonho;
        meuSonho = new Conta();
        meuSonho.saldo = 1500000;
        
        System.out.println("Titular da Conta: " + minhaConta.titular);
        System.out.println("Saldo anterior: " + minhaConta.saldo);

        // saca 200 reais
        if (minhaConta.saca(200)) {
            System.out.println("Consegui sacar");
        } else {
            System.out.println("Não consegui sacar");
        }

// deposita 500 reais
        minhaConta.deposita(500);

        System.out.println("Saldo atual: " + minhaConta.saldo);
    }
}