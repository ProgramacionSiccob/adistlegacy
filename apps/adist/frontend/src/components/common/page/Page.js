import React, { forwardRef } from 'react';
import PropTypes from 'prop-types';
import { Helmet } from 'react-helmet-async';
import { Box } from '@mui/material';

/**
 * @component
 * @category Components / Common
 * @subcategory page
 * @name Page
 * @description A page component that wraps the content of the page.
 * @returns {React.Component} Page component.
 */

const Page = forwardRef(({ children, title = '', ...other }, ref) => (
  <Box ref={ref} {...other}>
    <Helmet>
      <title>{title}</title>
    </Helmet>
    {children}
  </Box>
));

Page.propTypes = {
  /**
   * The children of the component.
   */
  children: PropTypes.node.isRequired,
  /**
   * The title of the page.
   */
  title: PropTypes.string.isRequired
};

export default Page;
