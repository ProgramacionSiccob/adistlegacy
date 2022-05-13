import React from 'react';
import { Box, Container, Grid, Paper, useTheme } from '@mui/material';
import PropTypes from 'prop-types';
import Copyright from '../ui/atoms/Copyright';

/**
 * @component
 * @category Pages
 * @name PublicPage
 * @description A public page layout
 * @param {object} props The component props
 * @returns {object} JSX
 */

export function PublicPage({ Component }) {
  const theme = useTheme();
  // const mobile = useMediaQuery(theme.breakpoints.between('xs', 'md'));
  // const landscape = useMediaQuery(
  //   '@media (min-width:0px) and (max-width:899.95px) and (orientation: landscape) '
  // );
  const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
    navigator.userAgent
  );
  const root = {
    [theme.breakpoints.down('sm')]: {
      alignItems: '',
      justifyContent: ''
    },
    [theme.breakpoints.up('sm')]: {
      direction: 'column',
      alignItems: 'center',
      justifyContent: 'center'
    },
    height: '100vh'
  };

  const paper = {
    paddingTop: '24px',
    height: '600px',
    borderRadius: '1rem',
    boxShadow: '0 25px 50px -12px rgb(0 0 0 / 0.25)',
    display: 'flex',
    flexDirection: 'column',

    [theme.breakpoints.down('lg')]: {
      maxWidth: 'none',
      minHeight: '100%',
      '@media (orientation: landscape)': {
        maxWidth: 'none',
        minHeight: '100%'
      }
    }
  };

  const divPanel = {
    margin: '20px'
    // [theme.breakpoints.down('md')]: {
    //   margin: '20px',
    // },
  };

  return (
    <Grid component="main" container spacing={0} sx={root}>
      <Container sx={paper} maxWidth="xs" elevation={7} component={isMobile ? Box : Paper}>
        <Box sx={divPanel}>{Component}</Box>
        <Box
          sx={{ marginTop: 'auto', marginBottom: 1 }}
          className="animate__animated animate__fadeIn"
          textAlign="center"
        >
          <Copyright name="Siccob Solutions" url="https://siccobsolutions.com.mx" />
        </Box>
      </Container>
    </Grid>
  );
}

PublicPage.propTypes = {
  /**
   * The component to render
   */
  Component: PropTypes.node.isRequired
};
