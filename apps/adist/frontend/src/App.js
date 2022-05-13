import React from 'react';
import { HelmetProvider } from 'react-helmet-async';
import { BrowserRouter } from 'react-router-dom';
import { Provider } from 'react-redux';
import ThemeConfig from './theme';
import GlobalStyles from './theme/globalStyles';
import AppRouter from './routers/AppRouter';
import { store } from './redux/store/store';

function App() {
  return (
    <Provider store={store}>
      <HelmetProvider>
        <BrowserRouter>
          <ThemeConfig>
            <GlobalStyles />
            <AppRouter />
          </ThemeConfig>
        </BrowserRouter>
      </HelmetProvider>
    </Provider>
  );
}

export default App;
