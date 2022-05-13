/// <reference types="cypress" />

import { Given, When, Then, Before } from 'cypress-cucumber-preprocessor/steps';

describe('Iniciar Sesion', () => {
  Given(/^que el usuario root ingresa sus credenciales$/, function () {
    cy.visit('/');
    cy.get('input').contains('Usuario').type('root');
    cy.get('input').contains('Contraseña').type('root');
  });

  When(/^selecciona ingresar$/, function () {
    cy.contains('ingresar').click();
  });

  Then(/^el sistema valida que las credenciales son correctas e ingresa la sistema$/, function () {
    cy.url().should('eq', 'http://localhost:8000/home');
  });
});
