<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
	  <table border="1">
	    <tr>
	        <th>Egilea</th>
	        <th>Gaia</th>
	        <th>Enuntziatua</th>
	        <th>Erantzuna</th>
	        <th>Faltsuak</th>
	    </tr>
	        <xsl:for-each select="assessmentItems/assessmentItem">
		        <tr>
		            <td><xsl:value-of select="@author"/></td>
		            <td><xsl:value-of select="@gaia"/></td>
		            <td><xsl:value-of select="itemBody/p"/></td>
		            <td><xsl:value-of select="correctResponse/response"/></td>
		            <td><xsl:for-each select="incorrectResponses/response">
		                	<xsl:value-of select="."/>
		                </xsl:for-each>  
		            </td>
		        </tr>   
	        </xsl:for-each>             
		</table>
	</body>
</html>
</xsl:template>
</xsl:stylesheet>