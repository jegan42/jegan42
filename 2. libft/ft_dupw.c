/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_dupw.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/06 22:17:35 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/06 22:17:37 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_dupw(const char *s, char c)
{
	int		i;
	char	*ws;

	i = 0;
	while (s[i] && !(s[i] == c))
		++i;
	if (!s || (!(ws = (char *)malloc(sizeof(char) * (i + 1)))))
		return ((char *)0);
	i = -1;
	while (s[++i] && !(s[i] == c))
		ws[i] = s[i];
	ws[i] = '\0';
	return (ws);
}
