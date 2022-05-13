import React, { useMemo } from 'react';
import PropTypes from 'prop-types';
import { CssBaseline, responsiveFontSizes } from '@mui/material';
import { ThemeProvider, createTheme, StyledEngineProvider } from '@mui/material/styles';
import shape from './shape';
import typography from './typography';
import componentsOverride from './overrides';
import shadows, { customShadows } from './shadows';
import palette from './palette';

/**
 * @component
 * @category Styles
 * @subcategory Theme
 * @name ThemeConfig
 * @description Theme configuration
 * @returns {React.ReactElement}
 */
export default function ThemeConfig({ children }) {
  const mode = 'light';
  const themeOptions = useMemo(
    () => ({
      palette: {
        mode,
        ...(mode === 'light'
          ? palette
          : {
              background: {
                paper: '#202124'
              }
              // palette values for dark mode
            })
      },
      shape,
      typography,
      shadows,
      customShadows
    }),
    [mode]
  );

  const theme = createTheme(themeOptions);
  const theme2 = responsiveFontSizes(theme);
  theme.components = componentsOverride(theme2);

  return (
    <StyledEngineProvider injectFirst>
      <ThemeProvider theme={theme}>
        <CssBaseline />
        {children}
      </ThemeProvider>
    </StyledEngineProvider>
  );
}

ThemeConfig.propTypes = {
  /**
   * The children of the theme provider
   */
  children: PropTypes.node
};
