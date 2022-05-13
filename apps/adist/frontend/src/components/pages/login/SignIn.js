import React from 'react';
import { Grid, Paper } from '@mui/material';
import Page from '../../common/page/Page';
import FormSignIn from '../../ui/organisms/Login/FormLogin';

/**
 * @component
 * @category Pages
 * @name SignIn
 * @description Login page
 * @return {JSX.Element}
 */
export default function SignIn() {
  return (
    <Page title="ADIST | Iniciar Sesión">
      <Grid
        container
        component="main"
        sx={{ height: '100vh' }}
        className="animate__animated animate__fadeIn"
      >
        <Grid
          item
          xs={false}
          sm={4}
          md={7}
          sx={{
            backgroundImage: 'url(/assets/img/login-bg/bg-7.jpg)',
            backgroundRepeat: 'no-repeat',
            backgroundColor: (t) =>
              t.palette.mode === 'light' ? t.palette.grey[50] : t.palette.grey[900],
            backgroundSize: 'cover',
            backgroundPosition: 'center'
          }}
        />
        <Grid item xs={12} sm={8} md={5} component={Paper} elevation={6} square>
          <FormSignIn />
        </Grid>
      </Grid>
    </Page>
  );
}
